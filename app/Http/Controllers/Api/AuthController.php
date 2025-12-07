<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Login with email + password and return API token
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $plain = $user->generateApiToken();

        return response()->json([
            'token' => $plain,
            'token_type' => 'Bearer',
            'user' => $user->only(['id','name','email','role'])
        ]);
    }

    /**
     * Logout (revoke token)
     */
    public function logout(Request $request)
    {
        $user = auth()->user();
        if ($user) {
            $user->revokeApiToken();
        }

        return response()->json(['message' => 'Logged out']);
    }
}
