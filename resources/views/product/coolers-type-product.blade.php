@extends('layout.template')
@section('title', 'Serfort - ' . $productType->name)
@section('content')
    {{-- Motherboard brief --}}
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-lg rounded-lg flex flex-col md:flex-row items-center justify-between p-6">
            <div class="text-left md:w-1/2 md:px-6">
                <h3 class="text-2xl font-semibold mb-4">CPU Coolers</h3>
                <p class="text-gray-700">
                    At Serfort, we take pride in offering top-tier CPU coolers engineered to keep your system cool and quiet
                    under pressure. Whether you're overclocking for peak performance or simply want efficient thermal
                    management, our coolers ensure your processor stays protected with optimal cooling and silent operation.
                </p>
            </div>
            <div class="md:w-1/2 flex justify-center md:justify-end mt-4 md:mt-0 md:px-6">
                <img src="{{ asset('storage/' . $productType->image_path) }}" alt="{{ $productType->name }}"
                    class="w-full h-auto max-w-md rounded-lg">
            </div>
        </div>
    </div>

    {{-- Product List --}}
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($products as $product)
                <div
                    class="bg-white shadow-lg rounded-lg overflow-hidden transform transition-transform duration-300 hover:scale-105">
                    <div class="bg-gray-100 p-6 text-center">
                        <h3 class="text-xl font-semibold mb-2">{{ $product->name }}</h3>
                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}"
                            class="w-full h-auto">
                        <p class="text-gray-900 font-bold mt-4">Rp. {{ number_format($product->price, 2) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
