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

    Route::get('/referensi-penginapan', [GuestController::class, 'hotelReference'])->name('hotel');
    Route::get('/referensi-oleh-oleh', [GuestController::class, 'souvenirReference'])->name('souvenir');
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
    Route::get('/visits', [VisitController::class, 'index'])->name('visits.index');
    Route::get('/visits/{id}', [VisitController::class, 'show']);
    Route::put('/visits/{id}', [VisitController::class, 'update']);
    Route::delete('/visits/{id}', [VisitController::class, 'destroy']);
    Route::put('/visits/{id}/verify', [VisitController::class, 'verify']);
    Route::put('/visits/{id}/cancel', [VisitController::class, 'cancel']);

    // Reports
    // Recap of all visits
    Route::get('/recap', [ReportController::class, 'visits'])->name('visits.recap');
    // Export all visits
    Route::get('/visits/export', [ReportController::class, 'exportVisits'])->name('visits.export');
    // Export a specific visit
    Route::get('/visits/{id}/export', [ReportController::class, 'exportVisit'])->name('visit.export');

});

// User Management (Super Admin Only)
Route::middleware(['auth', 'role:super-admin'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::prefix('regions')->group(function () {
    Route::get('provinces', [RegionController::class, 'provinces']);
    Route::get('provinces/{province}/cities', [RegionController::class, 'cities']);
});

require __DIR__.'/auth.php';