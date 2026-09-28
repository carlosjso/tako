<?php

use App\Http\Api\InventoryMovements\Controllers\InventoryMovementController;
use Illuminate\Support\Facades\Route;

Route::get('/inventory-movements', [InventoryMovementController::class, 'index']);
Route::post('/inventory-movements', [InventoryMovementController::class, 'store']);
Route::get('/inventory-movements/{id}', [InventoryMovementController::class, 'show'])->whereUuid('id');
