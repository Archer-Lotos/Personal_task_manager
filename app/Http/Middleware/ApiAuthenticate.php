<?php

namespace App\Http\Middleware;

use App\Models\ApiKey;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiAuthenticate
{
    public function handle(Request $request, Closure $next)
    {
        $key = $request->query('key');

        if (empty($key)) {
            $key = $request->input('key');
        }

        if (!empty($key)) {
            $key_bd = ApiKey::where('key', '=', $key)->first();
            if ($key_bd and $key_bd->exists()){
                Auth::loginUsingId($key_bd->user_id);
                return $next($request);
            } else {
                response()->json(['message' => 'Wrong key'], 401);
            }
        }

        return response()->json(['message' => 'API key not found'], 401);
    }
}
