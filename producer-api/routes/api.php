<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\VillageController;
use App\Http\Controllers\Api\AnnouncementController;

/*
|--------------------------------------------------------------------------
| API Routes for Producer Server
|--------------------------------------------------------------------------
|
| This file defines all API endpoints that will be consumed by the
| main application (Consumer).
|
*/

// Public API Routes (No Authentication Required)
Route::prefix('v1')->group(function () {
    
    // Districts
    Route::get('/districts', [DistrictController::class, 'index']);
    Route::get('/districts/search', [DistrictController::class, 'search']);
    Route::get('/districts/{id}', [DistrictController::class, 'show']);

    // Villages
    Route::get('/villages', [VillageController::class, 'index']);
    Route::get('/villages/search', [VillageController::class, 'search']);
    Route::get('/villages/{id}', [VillageController::class, 'show']);
    Route::get('/districts/{districtId}/villages', [VillageController::class, 'byDistrict']);

    // Announcements
    Route::get('/announcements', [AnnouncementController::class, 'index']);
    Route::get('/announcements/search', [AnnouncementController::class, 'search']);
    Route::get('/announcements/{id}', [AnnouncementController::class, 'show']);
    Route::get('/villages/{villageId}/announcements', [AnnouncementController::class, 'byVillage']);

});

// Health Check
Route::get('/health', function () {
    return response()->json([
        'status' => 'healthy',
        'timestamp' => now(),
    ]);
});

// Fallback
Route::fallback(function () {
    return response()->json([
        'status' => 'error',
        'message' => 'Endpoint not found',
    ], 404);
});
