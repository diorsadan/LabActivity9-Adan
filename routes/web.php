<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Opening the home page sends you to the dashboard
Route::redirect('/', '/dashboard');

// Login pages are for guests only (logged-in users get sent to the dashboard)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

// Logout is POST so it needs a form with @csrf
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Protected pages: guests are redirected to the route named 'login'
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/schedule', [DashboardController::class, 'schedule'])->name('schedule');
});
