<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/google', [AuthController::class, 'googleLogin']);
});

Route::post('/contact', [ContactController::class, 'store']);

Route::middleware('auth:api')->group(function () {
    Route::get('/user', [AuthController::class, 'getUser']);
});
