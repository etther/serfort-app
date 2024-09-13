<?php

use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductListController;
use Illuminate\Support\Facades\Route;

// Home Page
Route::get('/', [ProductTypeController::class, 'index'])->name('home');
Route::get('/product-types/create', [ProductTypeController::class, 'create'])->name('product-types.create');
Route::post('/product-types', [ProductTypeController::class, 'store'])->name('product-types.store');

// Product Page
Route::get('/products/{productType}', [ProductListController::class, 'index'])->name('products.index');
Route::get('/products/{productType}/create', [ProductListController::class, 'create'])->name('products.create');
Route::post('/products/{productType}', [ProductListController::class, 'store'])->name('products.store');
Route::get('/products/{productType}/{id}/edit', [ProductListController::class, 'edit'])->name('products.edit');
Route::put('/products/{productType}/{id}', [ProductListController::class, 'update'])->name('products.update');
Route::delete('/products/{productType}/{id}', [ProductListController::class, 'destroy'])->name('products.destroy');
