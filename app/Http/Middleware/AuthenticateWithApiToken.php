<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthenticateWithApiToken
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $header = $request->header('Authorization');
        $token = null;

        if ($header && str_starts_with($header, 'Bearer ')) {
            $token = substr($header, 7);
        } elseif ($request->header('X-API-TOKEN')) {
            $token = $request->header('X-API-TOKEN');
        }

        if ($token) {
            $hashed = hash('sha256', $token);
            $user = User::where('api_token', $hashed)->first();
            if ($user) {
                Auth::login($user);
                return $next($request);
            }
        }

        return response()->json(['message' => 'Unauthenticated.'], 401);
    }
}
