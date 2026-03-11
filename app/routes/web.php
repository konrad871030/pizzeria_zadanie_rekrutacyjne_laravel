<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;

Route::get('/', [MenuController::class, 'index'])->name('menu.index');
Route::get('/queue-status', [MenuController::class, 'queueStatus'])->name('menu.queue-status');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');