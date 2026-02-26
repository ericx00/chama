<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;

class RedirectIfAuthenticated
{
    public function handle(Request $request, callable $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (auth()->guard($guard)->check()) {
                return redirect('/dashboard');
            }
        }

        return $next($request);
    }
}
