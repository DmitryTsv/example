<?php

use App\Http\Controllers\OrdersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;


Route::get('/', function () {
    return view('viewMain');
});

Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', [ProductsController::class, 'index'])->name('products');
    Route::get('/create', [ProductsController::class, 'createProduct'])->name('create');
    Route::post('/add', [ProductsController::class, 'add'])->name('add');
    Route::get('/edit/{product}', [ProductsController::class, 'edit'])->name('edit');
    Route::put('/update/{product}', [ProductsController::class, 'update'])->name('update');
    Route::get('/delete/{product}', [ProductsController::class, 'delete'])->name('delete');
    Route::get('/{product}', [ProductsController::class, 'display'])->name('display');
});

Route::prefix('orders')->name('orders.')->group(function () {
    Route::get('/', [OrdersController::class, 'index'])->name('index');
    Route::post('/add', [OrdersController::class, 'add'])->name('add');
    Route::get('/create', [OrdersController::class, 'createOrder'])->name('createOrder');
    Route::get('/{order}', [OrdersController::class, 'display'])->name('display');
    Route::post('/{order}/complete', [OrdersController::class, 'complete'])->name('complete');
    Route::get('/delete/{order}', [OrdersController::class, 'delete'])->name('delete');
});