<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// This makes your custom login page the very first thing people see
Route::get('/', [AuthController::class, 'showLogin'])->name('welcome');

// This handles the data when someone clicks the "Login" button
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Add a dedicated /login route for direct access
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.page');
// Registration route for the register form
Route::post('/register', [AuthController::class, 'register'])->name('register');

// A placeholder for the dashboard after they log in
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');