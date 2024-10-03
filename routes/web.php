<?php

use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductListController;
use Illuminate\Support\Facades\Route;

// Home Page
Route::get('/', [ProductTypeController::class, 'index'])->name('home');
Route::get('/login', function () {
    return view('auth.login');
});

// Product Route
Route::get('/products/create', [ProductListController::class, 'create'])->name('products.create');
Route::get('/products/{productTypeSlug}', [ProductListController::class, 'index'])->name('products.index');
Route::get('/products/{productTypeSlug}/table', [ProductListController::class, 'table'])->name('products.table');
Route::post('/products', [ProductListController::class, 'store'])->name('products.store');
Route::get('/products/{productTypeSlug}/{productId}/edit', [ProductListController::class, 'edit'])->name('products.edit');
Route::put('/products/{productTypeSlug}/{productId}', [ProductListController::class, 'update'])->name('products.update');
Route::delete('/products/{productTypeSlug}/{productId}', [ProductListController::class, 'destroy'])->name('products.destroy');