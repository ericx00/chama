<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;

class ValidateSignature
{
    public function handle(Request $request, callable $next)
    {
        return $next($request);
    }
}
