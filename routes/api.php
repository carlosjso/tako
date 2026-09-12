<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RestaurantTableController;
use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::apiResource('users', UserController::class)->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('businesses', BusinessController::class);
    Route::put('/business/service-types', [BusinessController::class, 'updateServiceTypes']);
});

Route::apiResource('categories', CategoryController::class)->middleware('auth:sanctum');

Route::apiResource('products', ProductController::class)->middleware('auth:sanctum');

Route::apiResource('restaurant-tables', RestaurantTableController::class)->middleware(('auth:sanctum'));

Route::get('/service-types', [ServiceTypeController::class, 'index']);
Route::get('/service-types/{id}', [ServiceTypeController::class, 'show']);
