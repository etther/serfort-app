<?php

namespace App\Http\Controllers;

use App\Models\ProductType;

class ProductTypeController extends Controller
{
    public function index()
    {
        $productTypes = ProductType::all();
        return view('home', compact('productTypes'));
    }
}