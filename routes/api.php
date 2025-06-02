<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('google', [AuthController::class, 'googleLogin']);
});

Route::post('contact', [ContactController::class, 'store']);

Route::apiResource('joboffers', JobOfferController::class);
Route::prefix('joboffers')->group(function () {
    Route::get('slug/{slug}', [JobOfferController::class, 'getJobOfferBySlug']);
    Route::get('user', [JobOfferController::class, 'getUserJobOffers']);
});
Route::apiResource('categories', CategoryController::class);
Route::prefix('categories')->group(function () {
    Route::post('{category}/images', [CategoryController::class, 'addImageToCategory']);
    Route::delete('{category}/images', [CategoryController::class, 'removeImageFromCategory']);
    Route::get('{category}/images', [CategoryController::class, 'getAllImagesFromCategory']);
    Route::get('{category}/images/random', [CategoryController::class, 'getRandomImageFromCategory']);
});
Route::apiResource('favorites', FavoriteController::class);

Route::middleware('auth:api')->group(function () {
    Route::get('user', [AuthController::class, 'getUser']);

});
