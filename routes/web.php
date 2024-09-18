<?php

use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductListController;
use Illuminate\Support\Facades\Route;

// Home Page
Route::get('/', [ProductTypeController::class, 'index'])->name('home');

Route::get('/products/create', function () {
    return view('product.create-product');
});


// Product Page Routes
Route::get('/products/{productTypeSlug}', [ProductListController::class, 'index'])->name('products.index');
Route::get('/products/{productType}/create', [ProductListController::class, 'create'])->name('products.create');
Route::post('/products/{productType}', [ProductListController::class, 'store'])->name('products.store');
Route::get('/products/{productType}/{productId}/edit', [ProductListController::class, 'edit'])->name('products.edit');
Route::put('/products/{productType}/{productId}', [ProductListController::class, 'update'])->name('products.update');
Route::delete('/products/{productType}/{productId}', [ProductListController::class, 'destroy'])->name('products.destroy');