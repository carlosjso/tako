<?php

use App\Http\Api\WorkShifts\Controllers\WorkShiftController;
use Illuminate\Support\Facades\Route;

Route::get('/work-shifts', [WorkShiftController::class, 'index']);
Route::post('/work-shifts/clock-in', [WorkShiftController::class, 'clockIn']);
Route::get('/work-shifts/{id}', [WorkShiftController::class, 'show'])->whereUuid('id');
Route::put('/work-shifts/clock-out/{id}', [WorkShiftController::class, 'clockOut'])->whereUuid('id');
