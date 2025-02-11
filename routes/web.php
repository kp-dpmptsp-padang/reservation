<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;


// Guest
Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::post('/visits', [VisitController::class, 'store']);
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
    Route::get('/visits', [VisitController::class, 'index']);
    Route::get('/visits/{id}', [VisitController::class, 'show']);
    Route::put('/visits/{id}', [VisitController::class, 'update']);
    Route::delete('/visits/{id}', [VisitController::class, 'destroy']);
    Route::put('/visits/{id}/verify', [VisitController::class, 'verify']);
    Route::put('/visits/{id}/cancel', [VisitController::class, 'cancel']);

    // Reports
    Route::get('/reports/visits', [ReportController::class, 'exportVisits']);
    Route::get('/visits/{id}/export', [ReportController::class, 'exportVisit']);

});

// User Management (Super Admin Only)
Route::middleware(['auth', 'role:super-admin'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

require __DIR__.'/auth.php';
