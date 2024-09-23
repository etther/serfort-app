@extends('layout.template')
@section('title', 'Serfort - Create')
@section('content')
    <div class="container mx-auto px-4 max-w-2xl pb-20">
        <h1 class="text-3xl font-bold mb-6 text-white text-center">Create New Product</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-600 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <!-- Product Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-white">Product Name</label>
                <input type="text" name="name" id="name"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Enter the product name" value="{{ old('name') }}" required>
            </div>

            <!-- Product Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-white">Description</label>
                <textarea name="description" id="description" rows="3"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Describe the product">{{ old('description') }}</textarea>
            </div>

            <!-- Product Price -->
            <div>
                <label for="price" class="block text-sm font-medium text-white">Price (IDR)</label>
                <div class="relative mt-1">
                    <input type="number" name="price" id="price"
                        class="block w-full pl-16 pr-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="0" value="{{ old('price') }}" step="1000" min="0" required>
                </div>
            </div>


            <!-- Product Type (Dropdown) -->
            <div>
                <label for="product_type_id" class="block text-sm font-medium text-white">Product Type</label>
                <select name="product_type_id" id="product_type_id"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
                    <option value="" disabled selected>Select Product Type</option>
                    @foreach ($productTypes as $productType)
                        <option value="{{ $productType->id }}">{{ $productType->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Image Upload (File) with Preview -->
            <div>
                <label for="image" class="block text-sm font-medium text-white">Upload Image</label>
                <input type="file" name="image" id="image"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    accept="image/*" onchange="previewImage(event)">
                <img id="image-preview" src="#" alt="Image Preview"
                    class="mt-4 hidden w-32 h-32 object-cover rounded-md">
            </div>

            <!-- Image Base64 (Optional) -->
            <div>
                <label for="image_base64" class="block text-sm font-medium text-white">Image Base64 (Optional)</label>
                <textarea name="image_base64" id="image_base64" rows="3"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Paste base64-encoded image here">{{ old('image_base64') }}</textarea>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="w-full inline-flex justify-center py-3 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Create Product
                </button>
            </div>
        </form>
    </div>

    <script>
        // Image preview functionality
        function previewImage(event) {
            const image = document.getElementById('image-preview');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    image.src = e.target.result;
                    image.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                image.src = '#';
                image.classList.add('hidden');
            }
        }
    </script>
@endsection
