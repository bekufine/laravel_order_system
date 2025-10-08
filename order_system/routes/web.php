<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');



Route::middleware(['auth', 'verified'])->group(function () {
    // список заказов
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

    // создать заказ
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

    // обновить заказ
    Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');

    Route::get('dashboard', function () {
        return Inertia::render('Dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
    
    Route::get('/order', function(){
        return Inertia::render('Order');
    })->middleware(['auth', 'verified'])->name('order');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
