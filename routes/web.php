<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DistrictInformationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceRequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DistrictInformationController::class, 'index'])->name('home');

// Service Request routes
Route::get('/service-requests/create', [ServiceRequestController::class, 'create'])->name('service-requests.create');
Route::post('/service-requests', [ServiceRequestController::class, 'store'])->name('service-requests.store');
Route::get('/service-requests/{serviceRequest}', [ServiceRequestController::class, 'show'])->name('service-requests.show');

// District Information routes
Route::prefix('about')->group(function () {
    Route::get('/', [DistrictInformationController::class, 'index'])->name('district.information');
    Route::get('/tourism', [DistrictInformationController::class, 'tourism'])->name('district.tourism');
    Route::get('/culture', [DistrictInformationController::class, 'culture'])->name('district.culture');
});

// District Profile
Route::get('/profile', [DistrictInformationController::class, 'profile'])->name('district.profile');

// Villages List
Route::get('/villages', [DistrictInformationController::class, 'villages'])->name('district.villages');
Route::get('/villages/{id}', [DistrictInformationController::class, 'villageDetail'])->name('district.village.detail');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/user/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/user/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/user/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
