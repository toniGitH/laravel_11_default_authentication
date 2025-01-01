<?php

use Illuminate\Support\Facades\Route;

// Routes that redirect to home.
Route::get('/', [App\Http\Controllers\AuthController::class, 'home'])->name('home');
Route::get('/login', [App\Http\Controllers\AuthController::class, 'home'])->name('logintohome');
Route::get('/register', [App\Http\Controllers\AuthController::class, 'home'])->name('registertohome');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'home'])->name('logouttohome');

// Routes for guests
Route::middleware('guest')->group(function () {
    Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
    Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
});

// Routes for authenticated users
Route::middleware('auth')->group(function () {
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    Route::get('/index', [App\Http\Controllers\AuthController::class, 'index'])->name('index');
});