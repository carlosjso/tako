<?php

use App\Http\Api\RestaurantTables\Controllers\RestaurantTableController;
use Illuminate\Support\Facades\Route;

Route::apiResource('restaurant-tables', RestaurantTableController::class)->whereUuid('restaurant_table');
