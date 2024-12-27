<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiSlotController;
use App\Http\Controllers\AdminSlotObstacleController;
use App\Http\Controllers\TransaksiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/update-slot-status', [ApiSlotController::class, 'updateSlotStatus']);

Route::post('/update-slot', [AdminSlotObstacleController::class, 'updateSlot']);

Route::post('/transaksi', [TransaksiController::class, 'store']);






