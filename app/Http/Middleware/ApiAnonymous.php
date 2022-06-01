<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiAnonymous
{
    public function handle(Request $request, Closure $next)
    {
        $key = $request->query('key');
        if (empty($key)) {
            $key = $request->input('key');
        }
        if (empty($key)) {
            $key = $request->bearerToken();
        }

        if (!empty($key)) {
            return response()->json(['message' => 'You are already login'], 201);
        }

        return $next($request);
    }
}
