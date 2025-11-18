@extends('template.main-template')

@section('content')
    {{-- Hero Section --}}
    <section class="bg-[#FFF4E1] py-16 px-6 md:px-20 flex flex-col md:flex-row items-center justify-between">
        {{-- Text --}}
        <div class="flex-1 mb-10 md:mb-0" data-aos="fade-right">
            <h1 class="text-4xl md:text-5xl font-extrabold text-[#5A1E1E] leading-tight mb-6">
                ECOMMERCE <br>
                KERAJINAN LOKAL <br>
                INDONESIA
            </h1>
        </div>

        {{-- Image Carousel --}}
        <div class="flex-1 relative flex items-center justify-center gap-3" data-aos="fade-left">
            <button class="absolute left-0 md:-left-8 bg-white p-2 rounded-full shadow hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <div class="flex gap-4">
                <img src="https://i.ibb.co/YtKfS8y/basket.jpg" class="w-20 h-32 rounded-lg object-cover" alt="Basket">
                <img src="https://i.ibb.co/CVyxsgz/bowl.jpg" class="w-20 h-32 rounded-lg object-cover" alt="Bowl">
                <img src="https://i.ibb.co/jrCk2Rf/storage.jpg" class="w-32 h-48 rounded-lg object-cover" alt="Storage Basket">
            </div>

            <button class="absolute right-0 md:-right-8 bg-white p-2 rounded-full shadow hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </section>

    {{-- Produk Section --}}
    <section class="bg-gray-100 py-12 px-6 md:px-20">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6 text-center">
            {{-- Produk 1 --}}
            <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
                <img src="https://i.ibb.co/jrCk2Rf/storage.jpg" alt="Storage Basket" class="rounded-md mb-3 w-full h-40 object-cover">
                <h3 class="text-gray-800 font-medium">Storage basket</h3>
                <p class="text-gray-500">Rp 120.000</p>
            </div>

            {{-- Produk 2 --}}
            <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
                <img src="https://i.ibb.co/1L0zT4H/lamp.jpg" alt="Craft Lamp" class="rounded-md mb-3 w-full h-40 object-cover">
                <h3 class="text-gray-800 font-medium">Craft Lamp</h3>
                <p class="text-gray-500">Rp 100.000</p>
            </div>

            {{-- Produk 3 --}}
            <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
                <img src="https://i.ibb.co/WcxYbKw/vase.jpg" alt="Vas Rotan" class="rounded-md mb-3 w-full h-40 object-cover">
                <h3 class="text-gray-800 font-medium">Vas Rotan</h3>
                <p class="text-gray-500">Rp 100.000</p>
            </div>

            {{-- Produk 4 --}}
            <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
                <img src="https://i.ibb.co/pxDVV3P/container.jpg" alt="Container Storage" class="rounded-md mb-3 w-full h-40 object-cover">
                <h3 class="text-gray-800 font-medium">Container Storage</h3>
                <p class="text-gray-500">Rp 60.000</p>
            </div>

            {{-- Produk 5 --}}
            <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
                <img src="https://i.ibb.co/5T3whjF/bag.jpg" alt="Tas Rotan" class="rounded-md mb-3 w-full h-40 object-cover">
                <h3 class="text-gray-800 font-medium">Tas Rotan</h3>
                <p class="text-gray-500">Rp 50.000</p>
            </div>
        </div>
    </section>
@endsection

