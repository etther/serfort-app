<?php

namespace App\Http\Controllers;

use App\Models\ProductList;
use App\Models\ProductType;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class ProductListController extends Controller
{
    // Display a listing of the products (READ)
    public function index($productTypeSlug)
    {
        try {
            // Fetch product type by slug
            $productType = ProductType::where('slug', $productTypeSlug)->firstOrFail();
            $products = ProductList::where('product_type_id', $productType->id)->get();

            // Create the dynamic view name based on product type
            $productTypeName = Str::slug($productType->name, '_');

            // You could handle specific cases here if necessary
            $viewName = 'product.' . Str::slug($productType->name, '-') . '-product';

            // Check if the view file exists
            if (!view()->exists($viewName)) {
                return response()->json(['error' => 'View for this product type does not exist'], 404);
            }

            // Render the view with product data
            return view($viewName, [
                'productType' => $productType,
                'products' => $products,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('ProductType not found: ' . $productTypeSlug);
            return response()->json(['error' => 'Product type not found'], 404);
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

    public function create()
    {
        // Get all product types for the dropdown in the form
        $productTypes = ProductType::all();

        // Pass productTypes to the view
        return view('product.create-product', [
            'productTypes' => $productTypes,
        ]);
    }


    // Store a newly created product (CREATE)
    public function store(Request $request)
    {
        // Validate the input data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'product_type_id' => 'required|exists:product_types,id', // Ensure the product_type_id exists in the DB
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
            Log::error($e->getMessage()); // Log any errors
            return response()->json(['error' => 'An error occurred while creating the product'], 500);
        }
        Log::info($request->all()); // Log all incoming data for debugging

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