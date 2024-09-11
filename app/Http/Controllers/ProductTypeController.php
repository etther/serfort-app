<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function index()
    {
        $productTypes = ProductType::all();
        return view('home', compact('productTypes'));
    }

    public function create()
    {
        return view('product-types.product_type_create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image_path' => 'required|string|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Handle the image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('product_types_image', 'public');

            // Create a new product type record in the database
            ProductType::create([
                'name' => $request->name,
                'image_path' => $imagePath,
            ]);

            return redirect()->route('home')->with('success', 'Product type created successfully');
        }

        return redirect()->back()->with('error', 'Failed to upload the image');
    }
}