@extends('layout.template')
@section('title', 'Serfort - Product List')
@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-white text-3xl font-bold mb-6">All Products</h2>

        <!-- Responsive table container -->
        <div class="overflow-x-auto">
            <table class="min-w-full text-left text-sm text-gray-400 shadow-lg rounded-lg">
                <thead class="bg-gray-700 text-xs uppercase font-medium">
                    <tr>
                        <th scope="col" class="px-6 py-3">#</th>
                        <th scope="col" class="px-6 py-3">Product Name</th>
                        <th scope="col" class="px-6 py-3">Description</th>
                        <th scope="col" class="px-6 py-3">Price</th>
                        <th scope="col" class="px-6 py-3">Type</th> <!-- Add Type Column -->
                        <th scope="col" class="px-6 py-3">Image</th>
                        <th scope="col" class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-800 divide-y divide-gray-700">
                    @forelse($products as $product)
                        <tr>
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ e($product->name) }}</td>
                            <td class="px-6 py-4">{{ $product->description ?? 'N/A' }}</td>
                            <td class="px-6 py-4">{{ $product->price }}</td>
                            <td class="px-6 py-4">{{ $product->productType->name ?? 'No Type' }}</td>
                            <!-- Product Type Column -->
                            <td class="px-6 py-4">
                                @if ($product->image_path)
                                    <img src="{{ asset('storage/' . $product->image_path) }}" class="w-12 h-12 rounded-full"
                                        alt="Product Image">
                                @elseif($product->image_base64)
                                    <img src="data:image/png;base64,{{ $product->image_base64 }}"
                                        class="w-12 h-12 rounded-full" alt="Product Image">
                                @else
                                    <span class="text-gray-500">No Image</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 flex justify-between space-x-2">
                                <!-- Update Button -->
                                <a href="{{ route('products.edit', [$product->productType->slug, $product->id]) }}"
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded text-sm">
                                    Update
                                </a>


                                <!-- Delete Button -->
                                <form action="{{ route('products.destroy', [$product->productType->slug, $product->id]) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this product?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded text-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-gray-500">No products found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Add New Product Button -->
        <div class="mt-6">
            <a href="{{ route('products.create') }}"
                class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                Add New Product
            </a>
        </div>
    </div>
@endsection
