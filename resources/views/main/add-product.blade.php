@extends('template.main-template')

@section('content')

<div class="flex">

    {{-- =================================================== --}}
    {{-- A. Kolom Kiri: Display Produk yang Ada (70% Lebar) --}}
    {{-- =================================================== --}}
    <div class="w-3/4 p-6 border-r border-gray-200">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Produk Anda</h2>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            {{-- Loop produk Seller di sini --}}
            @php
                $products = [
                    ['name' => 'Tas Rotan', 'price' => 'Rp 50.000', 'rating' => 4.8, 'image' => 'tas_rotan.jpg'],
                    ['name' => 'Rak Buku', 'price' => 'Rp 250.000', 'rating' => 4.7, 'image' => 'rak_buku.jpg'],
                    ['name' => 'Tas Kayu', 'price' => 'Rp 150.000', 'rating' => 4.7, 'image' => 'tas_kayu.jpg'],
                    ['name' => 'Kotak Tisu', 'price' => 'Rp 25.000', 'rating' => 4.8, 'image' => 'kotak_tisu.jpg'],
                ];
            @endphp

            @foreach ($products as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition transform hover:scale-[1.02]">
                    <img src="{{ asset('images/' . rawurlencode(basename($product['image']))) }}" alt="{{ $product['name'] }}" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h3 class="font-medium text-gray-800">{{ $product['name'] }}</h3>
                        <div class="flex justify-between items-center mt-1 mb-3">
                            <p class="text-sm font-semibold text-gray-900">{{ $product['price'] }}</p>
                            <span class="text-xs text-gray-600 flex items-center">
                                <svg class="w-4 h-4 text-yellow-500 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.963a1 1 0 00.95.69h4.17c.969 0 1.371 1.24.588 1.81l-3.374 2.454a1 1 0 00-.364 1.118l1.286 3.963c.3.921-.755 1.688-1.54 1.118l-3.374-2.454a1 1 0 00-1.176 0l-3.374 2.454c-.784.57-1.84-.197-1.54-1.118l1.286-3.963a1 1 0 00-.364-1.118L2.091 9.39c-.783-.57-.381-1.81.588-1.81h4.17a1 1 0 00.95-.69l1.286-3.963z"></path></svg>
                                {{ $product['rating'] }}
                            </span>
                        </div>
                        <button class="w-full py-2 text-sm text-white font-medium rounded-md shadow-sm" style="background-color: #934c26;">
                            Lihat Detail
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- =============================================== --}}
    {{-- B. Kolom Kanan: Form Tambah Produk (30% Lebar) --}}
    {{-- =============================================== --}}
    <div class="w-1/4 p-6 shadow-xl bg-gray-50 fixed right-0 h-full border-l border-gray-300"
         style="background-color: #fbeedc;">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900" style="color: #4b2418;">+ Tambah Produk</h2>
            <button class="text-gray-500 hover:text-gray-900 text-xl font-bold">&times;</button>
        </div>

        <p class="text-sm text-gray-600 mb-6">Temukan Kerajinan tangan berkualitas dari pengrajin lokal</p>

        <form action="{{ route('seller.product.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div class="text-xs font-semibold uppercase tracking-wider text-center py-2 rounded-md"
                 style="background-color: #e9d5b8; color: #4b2418;">
                Tambah Produk Baru
            </div>

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
                <input type="text" id="name" name="name" class="w-full p-2 border border-gray-400 rounded-md focus:ring-1 focus:ring-gray-600" required>
            </div>

            <div>
                <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Jumlah Produk</label>
                <input type="number" id="quantity" name="quantity" min="1" class="w-full p-2 border border-gray-400 rounded-md focus:ring-1 focus:ring-gray-600" required>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea id="description" name="description" rows="3" class="w-full p-2 border border-gray-400 rounded-md focus:ring-1 focus:ring-gray-600" required></textarea>
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
                <input type="number" id="price" name="price" min="0" step="1000" class="w-full p-2 border border-gray-400 rounded-md focus:ring-1 focus:ring-gray-600" required>
            </div>

            <div>
                <label for="photo" class="block text-sm font-medium text-gray-700 mb-1">Foto Produk</label>
                <input type="file" id="photo" name="photo" accept="image/*" class="w-full p-2 border border-gray-400 rounded-md focus:ring-1 focus:ring-gray-600" required>
            </div>

            <button type="submit" class="w-full py-3 text-white font-medium rounded-md shadow-lg hover:opacity-90 transition duration-150 mt-4" style="background-color: #934c26;">
                Simpan Produk
            </button>
        </form>
    </div>

</div>

@endsection
