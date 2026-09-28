<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CashRegisterSessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RestaurantTableController;
use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkShiftController;
use App\Http\Controllers\InventoryMovementController;
use App\Models\InventoryMovement;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/orders', [OrderController::class, 'index']);
    Route::post('/orders', [OrderController::class, 'store']);
    Route::get('/orders/{id}', [OrderController::class, 'show']);
    Route::put('/orders/{id}', [OrderController::class, 'update']);
    Route::put('/orders/{id}/cancel', [OrderController::class, 'cancelOrder']);
});

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/orders/{orderId}/items', [OrderItemController::class, 'index']);
    Route::post('/orders/{orderId}/items', [OrderItemController::class, 'store']);
    Route::get('/orders/{orderId}/items/{id}', [OrderItemController::class, 'show']);
    Route::put('/orders/{orderId}/items/{id}', [OrderItemController::class, 'update']);
    Route::put('/orders/{orderId}/items/{id}/cancel', [OrderItemController::class, 'cancelItemOrder']);
});

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/orders/{orderId}/payments', [PaymentController::class, 'index']);
    Route::post('/orders/{orderId}/payments', [PaymentController::class, 'store']);
    Route::get('/payments/{id}', [PaymentController::class, 'show']);
});

Route::apiResource('restaurant-tables', RestaurantTableController::class)->middleware(('auth:sanctum'));

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/work-shifts', [WorkShiftController::class, 'index']);
    Route::post('/work-shifts/clock-in', [WorkShiftController::class, 'clockIn']);
    Route::get('/work-shifts/{id}', [WorkShiftController::class, 'show']);
    Route::put('/work-shifts/clock-out/{id}', [WorkShiftController::class, 'clockOut']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/cash-register-sessions', [CashRegisterSessionController::class, 'index']);
    Route::post('/cash-register-sessions/open-sessions', [CashRegisterSessionController::class, 'openSession']);
    Route::get('/cash-register-sessions/{id}', [CashRegisterSessionController::class, 'show']);
    Route::put('/cash-register-sessions/close-sessions/{id}', [CashRegisterSessionController::class, 'closeSession']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/inventory-movements', [InventoryMovementController::class, 'index']);
    Route::post('/inventory-movements', [InventoryMovementController::class, 'store']);
    Route::get('/inventory-movements/{id}', [InventoryMovementController::class, 'show']);
});

Route::get('/service-types', [ServiceTypeController::class, 'index']);
Route::get('/service-types/{id}', [ServiceTypeController::class, 'show']);
