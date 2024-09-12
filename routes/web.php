<?php

use App\Http\Controllers\ProductTypeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ProductTypeController::class, 'index'])->name('home');
Route::get('/product-types/create', [ProductTypeController::class, 'create'])->name('product-types.create');
Route::post('/product-types', [ProductTypeController::class, 'store'])->name('product-types.store');