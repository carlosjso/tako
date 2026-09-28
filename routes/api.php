<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    require __DIR__.'/api/businesses.php';
    require __DIR__.'/api/cash-register-sessions.php';
    require __DIR__.'/api/categories.php';
    require __DIR__.'/api/inventory-movements.php';
    require __DIR__.'/api/order-items.php';
    require __DIR__.'/api/orders.php';
    require __DIR__.'/api/payments.php';
    require __DIR__.'/api/products.php';
    require __DIR__.'/api/restaurant-tables.php';
    require __DIR__.'/api/users.php';
    require __DIR__.'/api/work-shifts.php';
});

require __DIR__.'/api/auth.php';
require __DIR__.'/api/service-types.php';
