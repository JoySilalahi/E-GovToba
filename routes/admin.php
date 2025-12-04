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
    Route::post('/visi-misi', [DashboardController::class, 'updateVisiMisi'])->name('update-visi-misi');
    Route::post('/upload-photo', [DashboardController::class, 'uploadPhoto'])->name('upload-photo');
    Route::delete('/photos/{id}', [DashboardController::class, 'deletePhoto'])->name('delete-photo');
    Route::post('/upload-bupati-photo', [DashboardController::class, 'uploadBupatiPhoto'])->name('upload-bupati-photo');
    Route::post('/upload-wakil-photo', [DashboardController::class, 'uploadWakilPhoto'])->name('upload-wakil-photo');
    Route::put('/update-bupati', [DashboardController::class, 'updateBupati'])->name('update-bupati');
    Route::put('/update-wakil-bupati', [DashboardController::class, 'updateWakilBupati'])->name('update-wakil-bupati');

    // Information Management
    Route::get('/information', [InformationController::class, 'index'])->name('information.index');
    Route::post('/information/visi-misi', [InformationController::class, 'updateVisiMisi'])->name('information.update-visi-misi');
    Route::post('/information/upload-documentation', [InformationController::class, 'uploadDocumentation'])->name('information.upload-documentation');
    Route::post('/information/upload-photo', [InformationController::class, 'uploadPhoto'])->name('information.upload-photo');
    Route::delete('/information/photos/{id}', [InformationController::class, 'deletePhoto'])->name('information.delete-photo');
    Route::post('/information/upload-bupati-photo', [InformationController::class, 'uploadBupatiPhoto'])->name('information.upload-bupati-photo');
    Route::post('/information/upload-wakil-bupati-photo', [InformationController::class, 'uploadWakilBupatiPhoto'])->name('information.upload-wakil-bupati-photo');
    Route::post('/information/upload-wakil-photo', [InformationController::class, 'uploadWakilBupatiPhoto'])->name('information.upload-wakil-photo');
    Route::post('/information/update-names', [InformationController::class, 'updateNames'])->name('information.update-names');
    Route::post('/information/update-periode', [InformationController::class, 'updatePeriode'])->name('information.update-periode');
    
    // News Management
    Route::post('/information/news', [InformationController::class, 'storeNews'])->name('information.news.store');
    Route::put('/information/news/{id}', [InformationController::class, 'updateNews'])->name('information.news.update');
    Route::delete('/information/news/{id}', [InformationController::class, 'deleteNews'])->name('information.news.delete');
    
    // Announcement Management
    Route::post('/information/announcements', [InformationController::class, 'storeAnnouncement'])->name('information.announcements.store');
    Route::put('/information/announcements/{id}', [InformationController::class, 'updateAnnouncement'])->name('information.announcements.update');
    Route::delete('/information/announcements/{id}', [InformationController::class, 'deleteAnnouncement'])->name('information.announcements.delete');

    // Agenda Management
    Route::post('/information/agendas', [InformationController::class, 'storeAgenda'])->name('information.agendas.store');
    Route::put('/information/agendas/{id}', [InformationController::class, 'updateAgenda'])->name('information.agendas.update');
    Route::delete('/information/agendas/{id}', [InformationController::class, 'deleteAgenda'])->name('information.agendas.delete');

    // Budget Management
    Route::post('/information/budgets', [InformationController::class, 'uploadBudget'])->name('information.budgets.upload');
    Route::delete('/information/budgets/{id}', [InformationController::class, 'deleteBudget'])->name('information.budgets.delete');

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