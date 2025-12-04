<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArtikelController;

Route::get('/', function () {
    return view('login');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');

Route::post('/proses', [AuthController::class, 'authenticate'])->name('login.authenticate');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');

Route::resource('artikel', ArtikelController::class)->only([
    'index', 'edit', 'update', 'destroy', 'store'
]);
