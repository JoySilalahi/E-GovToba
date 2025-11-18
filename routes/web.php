<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DistrictInformationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\VillageAdminController;
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

// API untuk check update village (untuk auto-refresh)
Route::get('/api/village-check-update/{id}', [DistrictInformationController::class, 'checkVillageUpdate'])->name('api.village.check-update');

// User Dashboard (untuk user biasa yang login)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();
        
        // Redirect berdasarkan role
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->isVillageAdmin()) {
            return redirect()->route('village-admin.dashboard');
        }
        
        // User biasa tampilkan dashboard user
        return view('dashboard', ['user' => $user]);
    })->name('dashboard');
});

// Village Admin Routes
Route::middleware(['auth', 'village-admin'])->prefix('village-admin')->name('village-admin.')->group(function () {
    Route::get('/dashboard', [VillageAdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [VillageAdminController::class, 'profile'])->name('profile');
    Route::get('/kelola-informasi', [VillageAdminController::class, 'kelolaInformasi'])->name('kelola-informasi');
    Route::post('/visi-misi', [VillageAdminController::class, 'updateVisiMisi'])->name('visi-misi.update');
    
    // Announcement routes
    Route::post('/announcements', [VillageAdminController::class, 'storeAnnouncement'])->name('announcements.store');
    Route::put('/announcements/{id}', [VillageAdminController::class, 'updateAnnouncement'])->name('announcements.update');
    Route::delete('/announcements/{id}', [VillageAdminController::class, 'deleteAnnouncement'])->name('announcements.delete');
    
    // Budget routes
    Route::get('/anggaran', [VillageAdminController::class, 'anggaran'])->name('anggaran');
    Route::post('/anggaran/upload', [VillageAdminController::class, 'uploadBudget'])->name('anggaran.upload');
    Route::post('/budget/upload', [VillageAdminController::class, 'uploadBudget'])->name('budget.upload');
    Route::delete('/anggaran/{id}', [VillageAdminController::class, 'deleteBudget'])->name('anggaran.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/user/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/user/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/user/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
