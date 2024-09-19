<?php

use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductListController;
use Illuminate\Support\Facades\Route;

// Home Page
Route::get('/', [ProductTypeController::class, 'index'])->name('home');

// Product Type Route
Route::get('/products/create', [ProductListController::class, 'create'])->name('products.create');
Route::get('/products/{productTypeSlug}', [ProductListController::class, 'index'])->name('products.index');
Route::post('/products', [ProductListController::class, 'store'])->name('products.store');
Route::get('/products/{productType}/{productId}/edit', [ProductListController::class, 'edit'])->name('products.edit');
Route::put('/products/{productType}/{productId}', [ProductListController::class, 'update'])->name('products.update');
Route::delete('/products/{productType}/{productId}', [ProductListController::class, 'destroy'])->name('products.destroy');