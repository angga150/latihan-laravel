<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

// Route::get('/users', function (Request $request) {
//     return "data sudah saya tampilkan";
// })->middleware('auth:sanctum');

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::post('/users/updateRole', [UserController::class, 'updateRole'])->name('users.updateRole');
});

// Route::post('/register', [RegisterController::class, 'register']);

Route::get('/auth/register', [RegisterController::class, 'index'])->name('register');
Route::post('/auth/register', [RegisterController::class, 'register'])->name('register.store');