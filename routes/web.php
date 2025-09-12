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
        Route::controller(HomeController::class)->group(function() {
            Route::get('/dashboard', 'index')->name('admin.dashboard');
            Route::get('/logout', 'logout')->name('admin.logout');
            Route::get('/bg-color', 'bgColor')->name('admin.bgcolor');
            Route::get('/typography', 'typography')->name('admin.typography');
            Route::get('/icons', 'icons')->name('admin.icons');
            Route::get('/loginv1', 'loginv1')->name('admin.loginv1');
            Route::get('/registerv1', 'registerv1')->name('admin.registerv1');
        });
    });

    // Unauthenticated Admin Routes
    Route::middleware('guest:admin')->group(function() {
        Route::get('/login', [LoginController::class, 'index'])->name('admin.login');
        Route::post('/login', [LoginController::class, 'authenticate'])->name('admin.authenticate');
    });
});
