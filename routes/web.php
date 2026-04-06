<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MovementController;
use Illuminate\Support\Facades\Route;

// Auth Routes
Route::get('/', [AuthController::class, 'showLogin'])->name('welcome');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.page');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// User Routes
Route::middleware('auth')->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    // User can only view movements (read-only)
    Route::get('/movements', [MovementController::class, 'index'])->name('movements.index');
    Route::get('/movements/{id}', [MovementController::class, 'show'])->name('movements.show');
});

// Admin Routes
Route::middleware('auth')->group(function () {
    // Admin Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('role:admin');

    // Admin Movement Management
    Route::get('/admin/movements', [AdminController::class, 'listMovements'])->name('admin.movements.index')->middleware('role:admin');
    Route::get('/admin/movements/create', [AdminController::class, 'createMovement'])->name('admin.movements.create')->middleware('role:admin');
    Route::post('/admin/movements/store', [AdminController::class, 'storeMovement'])->name('admin.movements.store')->middleware('role:admin');
    Route::get('/admin/movements/{id}/edit', [AdminController::class, 'editMovement'])->name('admin.movements.edit')->middleware('role:admin');
    Route::post('/admin/movements/{id}/update', [AdminController::class, 'updateMovement'])->name('admin.movements.update')->middleware('role:admin');
    Route::post('/admin/movements/{id}/delete', [AdminController::class, 'deleteMovement'])->name('admin.movements.delete')->middleware('role:admin');

    // Admin User Management
    Route::get('/admin/users', [AdminController::class, 'listUsers'])->name('admin.users.index')->middleware('role:admin');
    Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit')->middleware('role:admin');
    Route::post('/admin/users/{id}/update', [AdminController::class, 'updateUser'])->name('admin.users.update')->middleware('role:admin');
    Route::post('/admin/users/{id}/delete', [AdminController::class, 'deleteUser'])->name('admin.users.delete')->middleware('role:admin');
});
