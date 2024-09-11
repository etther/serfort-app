@extends('layout.template')
@section('title', 'Serfort - Product')
@section('content')
    <!-- Products Section -->
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold text-center text-white mb-8">Products Type</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="bg-gray-100 p-6 text-center">
                    <h3 class="text-xl font-semibold mb-2">Case</h3>
                    <img src="/img/case_type.png" alt="A3-mATX" class="w-full h-auto">
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="bg-gray-100 p-6 text-center">
                    <h3 class="text-xl font-semibold mb-2">CPU Cooler</h3>
                    <img src="/img/coolers_type.png" alt="O11 VISION" class="w-full h-auto">
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="bg-gray-100 p-6 text-center">
                    <h3 class="text-xl font-semibold mb-2">GPU</h3>
                    <img src="/img/gpu_type.png" alt="O11 Dynamic EVO XL" class="w-full h-auto">
                </div>
            </div>
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="bg-gray-100 p-6 text-center">
                    <h3 class="text-xl font-semibold mb-2">Motherboard</h3>
                    <img src="/img/motherboard_type.png" alt="O11 Dynamic EVO XL" class="w-full h-auto">
                </div>
            </div>
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="bg-gray-100 p-6 text-center">
                    <h3 class="text-xl font-semibold mb-2">Memory</h3>
                    <img src="/img/memory_type.png" alt="O11 Dynamic EVO XL" class="w-full h-auto">
                </div>
            </div>
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="bg-gray-100 p-6 text-center">
                    <h3 class="text-xl font-semibold mb-2">PSU</h3>
                    <img src="/img/psu_type.png" alt="O11 Dynamic EVO XL" class="w-full h-auto">
                </div>
            </div>
        </div>
    </div>
@endsection
