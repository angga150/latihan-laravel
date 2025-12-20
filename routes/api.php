<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodolistController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'login']);

Route::post('/register', [AuthController::class, 'proses']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard']);
});

Route::get('/comments', [CommentController::class, 'index']);

Route::apiResource('/users', UserController::class);

Route::apiResource('/todolists', TodolistController::class)->middleware('auth:sanctum');

