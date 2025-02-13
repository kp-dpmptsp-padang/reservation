<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RegionController;


// Guest
Route::middleware('guest')->group(function () {
    Route::get('/', [GuestController::class, 'home'])->name('home');
    Route::get('/reservasi', [GuestController::class, 'reservation'])->name('reservation');
    Route::post('/visits', [VisitController::class, 'store'])->name('visits.store');
    Route::get('/reservasi/sukses/{token}', [VisitController::class, 'showSuccess'])->name('reservation.success');

    // Route::get('/referensi-penginapan', [GuestController::class, 'hotelReference'])->name('hotel');
    // Route::get('/referensi-oleh-oleh', [GuestController::class, 'souvenirReference'])->name('souvenir');
});

// Authenticated Routes
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile  
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Visit Management
    Route::get('/kunjungan', [VisitController::class, 'index'])->name('visits.index');
    Route::get('/kunjungan/all', [VisitController::class, 'all'])->name('visits.all');
    Route::get('/kunjungan/filter', [VisitController::class, 'filter'])->name('visits.filter');
    Route::put('/kunjungan/{id}', [VisitController::class, 'update'])->name('visits.update');
    Route::delete('/kunjungan/{id}', [VisitController::class, 'deny'])->name('visits.deny');
    Route::put('/kunjungan/{id}/verify', [VisitController::class, 'verify'])->name('visits.verify');
    Route::put('/kunjungan/{id}/cancel', [VisitController::class, 'cancel'])->name('visits.cancel');
    

    // Recap
    Route::get('/rekap', [ReportController::class, 'recap'])->name('visits.recap');
    Route::get('/rekap/all', [ReportController::class, 'all'])->name('recap.all');
    Route::get('/rekap/filter', [ReportController::class, 'filter'])->name('recap.filter');
    
    // Export
    Route::post('/kunjungan/export', [ReportController::class, 'exportVisits'])->name('visits.export'); // New route for exporting visit data
    Route::post('/rekap/export', [ReportController::class, 'exportRecap'])->name('recap.export');
    
    // Export a specific visit
    Route::post('/kunjungan/{id}/export', [ReportController::class, 'exportVisit'])->name('visit.export');

});

// User Management (Super Admin Only)
Route::middleware(['auth', 'role:super-admin'])->group(function () {
    Route::get('/admin', [UserController::class, 'index'])->name('users.index');
    Route::post('/admin', [UserController::class, 'store'])->name('users.store');
    Route::put('/admin/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/admin/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::prefix('regions')->group(function () {
    Route::get('provinces', [RegionController::class, 'provinces']);
    Route::get('provinces/{province}/cities', [RegionController::class, 'cities']);
});

require __DIR__.'/auth.php';