@extends('layout.template')
@section('title', 'Serfort - Edit Product')
@section('content')
    <div class="container mx-auto px-6 py-12">
        <div class="max-w-4xl mx-auto bg-gray-800 p-8 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-white mb-8">Edit Product - {{ $product->name }}</h1>

            {{-- Display validation errors --}}
            @if ($errors->any())
                <div class="bg-red-600 text-white p-4 rounded-md mb-6">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Edit Product Form --}}
            <form action="{{ route('products.update', [$productType->slug, $product->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Product Name --}}
                <div class="mb-6">
                    <label for="name" class="block text-white font-semibold mb-2">Product Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required
                        class="w-full p-3 bg-gray-700 text-white placeholder-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                {{-- Product Description --}}
                <div class="mb-6">
                    <label for="description" class="block text-white font-semibold mb-2">Description</label>
                    <textarea id="description" name="description" required
                        class="w-full p-3 bg-gray-700 text-white placeholder-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $product->description) }}</textarea>
                </div>

                {{-- Product Price --}}
                <div class="mb-6">
                    <label for="price" class="block text-white font-semibold mb-2">Price</label>
                    <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" required
                        min="0" step="0.01"
                        class="w-full p-3 bg-gray-700 text-white placeholder-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                {{-- Product Type Dropdown --}}
                <div class="mb-6">
                    <label for="product_type_id" class="block text-white font-semibold mb-2">Product Type</label>
                    <select id="product_type_id" name="product_type_id"
                        class="w-full p-3 bg-gray-700 text-white placeholder-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @foreach ($productTypes as $type)
                            <option value="{{ $type->id }}"
                                {{ $product->product_type_id == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Image Upload --}}
                <div class="mb-6">
                    <label for="image" class="block text-white font-semibold mb-2">Product Image</label>
                    <input type="file" id="image" name="image"
                        class="w-full p-3 bg-gray-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @if ($product->image_path)
                        <div class="mt-4">
                            <p class="text-white">Current Image:</p>
                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="Product Image"
                                class="h-32 w-auto mt-2 rounded-lg">
                        </div>
                    @endif
                </div>

                {{-- Base64 Image (Optional) --}}
                <div class="mb-6">
                    <label for="image_base64" class="block text-white font-semibold mb-2">Or Upload Image via Base64</label>
                    <input type="text" id="image_base64" name="image_base64"
                        value="{{ old('image_base64', $product->image_base64) }}"
                        class="w-full p-3 bg-gray-700 text-white placeholder-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                {{-- Submit Button --}}
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Update Product
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
