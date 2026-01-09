<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

/*
| AUTH (TANPA JWT)
*/
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

/*
| PUBLIC CRUD (TANPA JWT) - AMAN UNTUK UAP
*/
Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories/{slug}', [CategoryController::class, 'show']);
Route::put('/categories/{slug}', [CategoryController::class, 'update']);
Route::delete('/categories/{slug}', [CategoryController::class, 'destroy']);

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{slug}', [ProductController::class, 'show']);
Route::put('/products/{slug}', [ProductController::class, 'update']);
Route::delete('/products/{slug}', [ProductController::class, 'destroy']);

/*
| JWT (NILAI PLUS)
*/
Route::middleware('jwt.auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', function () {
        return auth()->user();
    });
});
