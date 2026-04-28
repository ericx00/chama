<?php

namespace App\Http\Middleware;

use App\Models\ActivityLog;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * Records every state-changing HTTP request to the activity_logs table so that
 * administrators can audit every action performed against the system.
 *
 * State-changing methods (POST, PUT, PATCH, DELETE) are logged. Authentication
 * routes are skipped here because they are recorded by the AuthController itself
 * with richer context (success/failure, email used).
 */
class LogActivity
{
    private const TRACKED_METHODS = ['POST', 'PUT', 'PATCH', 'DELETE'];

    private const SKIP_PATH_PREFIXES = ['login', 'logout'];

    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        try {
            if ($this->shouldLog($request, $response)) {
                ActivityLog::create([
                    'user_id'     => Auth::id(),
                    'action'      => $this->resolveAction($request),
                    'description' => $this->describe($request, $response),
                    'method'      => $request->getMethod(),
                    'url'         => $request->fullUrl(),
                    'ip_address'  => $request->ip(),
                    'user_agent'  => substr((string) $request->userAgent(), 0, 255),
                    'status_code' => $response->getStatusCode(),
                    'context'     => $this->safeContext($request),
                ]);
            }
        } catch (Throwable $exception) {
            // Never let audit logging break the user request - capture and move on.
            Log::warning('Activity logging failed', [
                'message' => $exception->getMessage(),
                'url'     => $request->fullUrl(),
            ]);
        }

        return $response;
    }

    private function shouldLog(Request $request, Response $response): bool
    {
        if (! in_array($request->getMethod(), self::TRACKED_METHODS, true)) {
            return false;
        }

        foreach (self::SKIP_PATH_PREFIXES as $prefix) {
            if ($request->is($prefix) || $request->is($prefix . '/*')) {
                return false;
            }
        }

        // Do not log validation failures (422) or unauthorized (401/403)
        // because they did not actually mutate state.
        $status = $response->getStatusCode();

        return $status < 400 || $status === 302;
    }

    private function resolveAction(Request $request): string
    {
        $route = $request->route();
        $name = $route?->getName();

        if ($name) {
            return $name;
        }

        return strtolower($request->getMethod()) . ':' . trim($request->path(), '/');
    }

    private function describe(Request $request, Response $response): string
    {
        $method = $request->getMethod();
        $path   = '/' . trim($request->path(), '/');
        $status = $response->getStatusCode();

        return sprintf('%s %s -> HTTP %d', $method, $path, $status);
    }

    private function safeContext(Request $request): ?array
    {
        $payload = $request->except([
            '_token',
            '_method',
            'password',
            'password_confirmation',
            'current_password',
        ]);

        if (empty($payload)) {
            return null;
        }

        // Encode and truncate to keep the log row a manageable size.
        $encoded = json_encode($payload, JSON_UNESCAPED_UNICODE);
        if ($encoded === false) {
            return null;
        }

        if (strlen($encoded) > 4000) {
            $encoded = substr($encoded, 0, 4000);
        }

        return ['payload' => $encoded];
    }
}
