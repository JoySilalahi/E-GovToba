<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::prefix('v1')->group(function () {
    // Authentication
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth.apitoken');

    // Example protected route
    Route::get('user', function () {
        return response()->json(auth()->user());
    })->middleware('auth.apitoken');
});
