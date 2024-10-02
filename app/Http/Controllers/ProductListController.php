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
    // product (READ)
    public function index($productTypeSlug)
    {
        try {

            $productType = ProductType::where('slug', $productTypeSlug)->firstOrFail();
            $products = ProductList::where('product_type_id', $productType->id)->get();

            $productTypeName = Str::slug($productType->name, '_');

            $viewName = 'product.' . Str::slug($productType->name, '-') . '-product';


            if (!view()->exists($viewName)) {
                return response()->json(['error' => 'View for this product type does not exist'], 404);
            }

            return view($viewName, [
                'productType' => $productType,
                'products' => $products,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('ProductType not found: ' . $productTypeSlug);
            return response()->json(['error' => 'Product type not found'], 404);
        }
    }

    public function table($productTypeSlug)
    {
        try {
            // Find the ProductType by its slug
            $productType = ProductType::where('slug', $productTypeSlug)->firstOrFail();

            // Get all products for this product type
            $products = ProductList::where('product_type_id', $productType->id)->get();

            // Render the product table view
            return view('product.products-table', [
                'productType' => $productType,
                'products' => $products,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
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
            'product_type_id' => 'required|exists:product_types,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image
            'image_base64' => 'nullable|string', // Optional base64 image
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $data = $validator->validated();

            // Handle file upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imagePath = $image->store('images', 'public'); // Store in storage/app/public/images
                $data['image_path'] = $imagePath;
            }

            // Handle base64 image if available
            if ($request->input('image_base64')) {
                $data['image_base64'] = $request->input('image_base64');
            }

            // Create product with validated data
            $product = ProductList::create($data);

            return response()->json($product, 201);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'An error occurred while creating the product'], 500);
        }
    }

    public function edit($productTypeSlug, $productId)
    {
        try {
            $productType = ProductType::where('slug', $productTypeSlug)->firstOrFail();
            $product = ProductList::findOrFail($productId);
            $productTypes = ProductType::all();

            return view('product.products-edit', [
                'product' => $product,
                'productTypes' => $productTypes,
                'productType' => $productType,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }

    // Update an existing product (UPDATE)
    public function update(Request $request, $productTypeSlug, $productId)
    {
        try {
            $product = ProductList::find($productId);

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
    public function destroy($productTypeSlug, $productId)
    {
        try {
            $product = ProductList::find($productId);

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
