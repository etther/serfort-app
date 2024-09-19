@extends('layout.template')
@section('title', 'Serfort - Create')
@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6">Create New Product</h1>

        <!-- Display any validation errors -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-600 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Product creation form -->
        <form action="{{ route('products.store') }}" method="POST" class="space-y-6">
            @csrf <!-- CSRF token for security -->

            <!-- Product Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                <input type="text" name="name" id="name"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    value="{{ old('name') }}" required>
            </div>

            <!-- Product Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('description') }}</textarea>
            </div>

            <!-- Product Price -->
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <input type="number" name="price" id="price"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    value="{{ old('price') }}" required>
            </div>

            <!-- Product Type (Dropdown) -->
            <div>
                <label for="product_type_id" class="block text-sm font-medium text-gray-700">Product Type</label>
                <select name="product_type_id" id="product_type_id"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
                    <option value="" disabled selected>Select Product Type</option>
                    @foreach ($productTypes as $productType)
                        <option value="{{ $productType->id }}">{{ $productType->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Image Path (URL) -->
            <div>
                <label for="image_path" class="block text-sm font-medium text-gray-700">Image URL</label>
                <input type="text" name="image_path" id="image_path"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    value="{{ old('image_path') }}">
            </div>

            <!-- Image Base64 (Optional) -->
            <div>
                <label for="image_base64" class="block text-sm font-medium text-gray-700">Image Base64 (Optional)</label>
                <textarea name="image_base64" id="image_base64" rows="4"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('image_base64') }}</textarea>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Create Product
                </button>
            </div>
        </form>
    </div>
@endsection
