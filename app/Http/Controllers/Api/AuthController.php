<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Login using email and password. Returns a bearer token.
     */
    public function login(Request $request): JsonResponse
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $user = User::where('email', $data['email'])->first();

        if (! $user || ! Hash::check($data['password'], $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // Generate a random token (we store the hashed value)
        $plainToken = bin2hex(random_bytes(40));
        $user->api_token = hash('sha256', $plainToken);
        $user->save();

        return response()->json([
            'token' => $plainToken,
            'token_type' => 'Bearer',
            'user' => $user,
        ], 200);
    }

    /**
     * Return the authenticated user for a given token header.
     */
    public function me(Request $request): JsonResponse
    {
        $user = $this->userFromRequest($request);

        if (! $user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        return response()->json(['user' => $user]);
    }

    /**
     * Logout (revoke) token
     */
    public function logout(Request $request): JsonResponse
    {
        $user = $this->userFromRequest($request);

        if (! $user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $user->api_token = null;
        $user->save();

        return response()->json(['message' => 'Logged out']);
    }

    /**
     * Helper to find user by token from headers.
     */
    protected function userFromRequest(Request $request): ?User
    {
        $header = $request->header('Authorization') ?: $request->header('X-API-TOKEN');

        if (! $header) {
            return null;
        }

        // support "Bearer <token>" or plain token
        if (str_starts_with($header, 'Bearer ')) {
            $token = substr($header, 7);
        } else {
            $token = $header;
        }

        if (! $token) {
            return null;
        }

        $hashed = hash('sha256', $token);

        return User::where('api_token', $hashed)->first();
    }
}
