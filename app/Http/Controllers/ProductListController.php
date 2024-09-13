<?php

namespace App\Http\Controllers;

use App\Models\ProductList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductListController extends Controller
{
    // Display a listing of the products (READ)
    public function index()
    {
        try {
            $products = ProductList::with('productType')->get();
            return response()->json($products, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching products'], 500);
        }
    }

    // Show a single product by ID (READ)
    public function show($id)
    {
        try {
            $product = ProductList::with('productType')->find($id);

            if (!$product) {
                return response()->json(['message' => 'Product not found'], 404);
            }

            return response()->json($product, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching the product'], 500);
        }
    }

    // Store a newly created product (CREATE)
    public function store(Request $request)
    {
        // Validate the input data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'product_type_id' => 'required|exists:product_types,id',
            'image_path' => 'nullable|string',
            'image_base64' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // Validation error response
        }

        try {
            // Create the new product
            $product = ProductList::create($validator->validated());

            return response()->json($product, 201); // Return 201 status for resource creation
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while creating the product'], 500);
        }
    }

    // Update an existing product (UPDATE)
    public function update(Request $request, $id)
    {
        try {
            $product = ProductList::find($id);

            if (!$product) {
                return response()->json(['message' => 'Product not found'], 404);
            }

            // Validate the input data
            $validator = Validator::make($request->all(), [
                'name' => 'sometimes|required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'sometimes|required|numeric|min:0',
                'product_type_id' => 'sometimes|required|exists:product_types,id',
                'image_path' => 'nullable|string',
                'image_base64' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            // Update the product with validated data
            $product->update($validator->validated());

            return response()->json($product, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while updating the product'], 500);
        }
    }

    // Remove the specified product (DELETE)
    public function destroy($id)
    {
        try {
            $product = ProductList::find($id);

            if (!$product) {
                return response()->json(['message' => 'Product not found'], 404);
            }

            $product->delete();

            return response()->json(['message' => 'Product deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while deleting the product'], 500);
        }
    }
}
