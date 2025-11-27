<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServiceRequestController;
use App\Http\Controllers\Admin\CitizenController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\VillageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReportController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Information Management
    Route::get('/information', [InformationController::class, 'index'])->name('information.index');
    Route::post('/information/visi-misi', [InformationController::class, 'updateVisiMisi'])->name('information.update-visi-misi');
    Route::post('/information/upload-documentation', [InformationController::class, 'uploadDocumentation'])->name('information.upload-documentation');
    Route::post('/information/upload-photo', [InformationController::class, 'uploadPhoto'])->name('information.upload-photo');
    Route::delete('/information/photos/{id}', [InformationController::class, 'deletePhoto'])->name('information.delete-photo');

    // Services Management
    Route::resource('services', ServiceController::class);
    Route::post('services/{service}/toggle', [ServiceController::class, 'toggle'])->name('services.toggle');

    // Service Requests Management
    Route::resource('requests', ServiceRequestController::class);
    Route::post('requests/{request}/process', [ServiceRequestController::class, 'process'])->name('requests.process');
    Route::post('requests/{request}/complete', [ServiceRequestController::class, 'complete'])->name('requests.complete');
    Route::post('requests/{request}/reject', [ServiceRequestController::class, 'reject'])->name('requests.reject');

    // Citizens Management
    Route::resource('citizens', CitizenController::class);
    Route::get('citizens/{citizen}/services', [CitizenController::class, 'services'])->name('citizens.services');

    // Districts Management
    Route::resource('districts', DistrictController::class);
    Route::get('districts/{district}/villages', [DistrictController::class, 'villages'])->name('districts.villages');

    // Villages Management
    Route::resource('villages', VillageController::class);

    // Users Management
    Route::resource('users', UserController::class);
    Route::post('users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggle-status');

    // Reports
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('reports/services', [ReportController::class, 'services'])->name('reports.services');
    Route::get('reports/requests', [ReportController::class, 'requests'])->name('reports.requests');
    Route::get('reports/citizens', [ReportController::class, 'citizens'])->name('reports.citizens');
    Route::get('reports/export/{type}', [ReportController::class, 'export'])->name('reports.export');
});