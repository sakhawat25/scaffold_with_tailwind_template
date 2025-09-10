<?php

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function() {
    // Authenticated Admin Routes
    Route::middleware('auth:admin')->group(function() {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    });

    // Unauthenticated Admin Routes
    Route::middleware('guest:admin')->group(function() {
        Route::get('/login', [LoginController::class, 'index'])->name('admin.login');
        Route::post('/login', [LoginController::class, 'authenticate'])->name('admin.authenticate');
    });
});
