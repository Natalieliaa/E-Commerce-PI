@extends('template.main-template')

@section('content')

    <div class="max-w-7xl mx-auto p-8">

        {{-- Header Tampilan Produk --}}
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Produk Kerajinan Lokal Pilihan</h1>

        {{-- Grid Produk --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">

            {{-- Data Produk (Gunakan loop @foreach untuk data dari database) --}}
            @php
                $products = [
                    ['name' => 'Rak Buku', 'price' => 'Rp 250.000', 'image' => 'rak_buku.jpg'],
                    ['name' => 'Kotak Tisu', 'price' => 'Rp 25.000', 'image' => 'kotak_tisu.jpg'],
                    ['name' => 'Vas Kayu', 'price' => 'Rp 100.000', 'image' => 'vas_kayu.jpg'],
                    ['name' => 'Tas Kayu', 'price' => 'Rp 150.000', 'image' => 'tas_kayu.jpg'],
                    ['name' => 'Bingkai Foto', 'price' => 'Rp 50.000', 'image' => 'bingkai_foto.jpg'],
                    ['name' => 'Storage basket', 'price' => 'Rp 120.000', 'image' => 'storage_basket.jpg'],
                    ['name' => 'Craft Lamp', 'price' => 'Rp 100.000', 'image' => 'craft_lamp.jpg'],
                    ['name' => 'Vas Rotan', 'price' => 'Rp 100.000', 'image' => 'vas_rotan.jpg'],
                    ['name' => 'Meja Kayu', 'price' => 'Rp 200.000', 'image' => 'meja_kayu.jpg'],
                    ['name' => 'Tas Rotan', 'price' => 'Rp 50.000', 'image' => 'tas_rotan.jpg'],
                ];
            @endphp

            @foreach ($products as $product)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition transform hover:shadow-xl hover:-translate-y-1 duration-300 cursor-pointer">

                    {{-- Gambar Produk --}}
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('images/' . $product['image']) }}" alt="{{ $product['name'] }}"
                             class="w-full h-full object-cover p-3">
                    </div>

                    {{-- Detail Produk --}}
                    <div class="p-4 text-center">
                        <h3 class="font-medium text-gray-800 truncate mb-1">{{ $product['name'] }}</h3>
                        <p class="text-lg font-bold text-gray-900">{{ $product['price'] }}</p>

                        {{-- Opsi: Tambahkan rating atau tombol beli cepat di sini --}}
                        <a href="{{ route('product.detail', ['slug' => Str::slug($product['name'])]) }}"
                           class="mt-3 inline-block text-xs text-blue-600 hover:text-blue-800 font-medium">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Opsi: Pagination di sini --}}
        {{-- <div class="mt-10">
            {{ $products->links() }}
        </div> --}}

    </div>

@endsection
