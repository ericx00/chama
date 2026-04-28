<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');

        if (! Auth::attempt($credentials, $remember)) {
            $this->logAuthEvent('auth.login.failed', null, $request, 'Failed login attempt for ' . $credentials['email']);

            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'The provided credentials do not match our records.']);
        }

        $request->session()->regenerate();

        $this->logAuthEvent('auth.login', Auth::id(), $request, Auth::user()->name . ' signed in');

        return redirect()->intended('/dashboard');
    }

    public function logout(Request $request): RedirectResponse
    {
        $userId = Auth::id();
        $name   = Auth::user()?->name;

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $this->logAuthEvent('auth.logout', $userId, $request, ($name ?? 'User') . ' signed out');

        return redirect('/')->with('status', 'You have been signed out.');
    }

    private function logAuthEvent(string $action, ?int $userId, Request $request, string $description): void
    {
        try {
            ActivityLog::create([
                'user_id'     => $userId,
                'action'      => $action,
                'description' => $description,
                'method'      => $request->getMethod(),
                'url'         => $request->fullUrl(),
                'ip_address'  => $request->ip(),
                'user_agent'  => substr((string) $request->userAgent(), 0, 255),
                'status_code' => 302,
            ]);
        } catch (\Throwable $e) {
            // Never block authentication on logging failure.
        }
    }
}
