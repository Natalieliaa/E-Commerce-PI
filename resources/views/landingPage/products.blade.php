{{-- resources/views/landingPage/products.blade.php --}}
@extends('template.main-template')

@section('content')
<div class="bg-gray-100 py-12 px-6 md:px-20">
    @php
        use Illuminate\Support\Str;

        $products = [
            ['name' => 'Rak Buku',       'price' => 250000, 'image' => 'images/rak buku.jpg'],
            ['name' => 'Gantungan',      'price' => 25000,  'image' => 'images/gantungan.jpg'],
            ['name' => 'Vas Rotan',      'price' => 100000, 'image' => 'images/vas rotan.jpg'],
            ['name' => 'Keranjang',      'price' => 150000, 'image' => 'images/keranjang.jpg'],
            ['name' => 'Bingkai Foto',   'price' => 50000,  'image' => 'images/bingkai foto.jpg'],
            ['name' => 'Storage', 'price' => 120000, 'image' => 'images/storage.jpg'],
            ['name' => 'Craft Lamp',     'price' => 100000, 'image' => 'images/craft lamp.jpg'],
            ['name' => 'Meja Kayu',      'price' => 200000, 'image' => 'images/meja.jpg'],
            ['name' => 'Tas Rotan',      'price' => 90000,  'image' => 'images/tas rotan.jpg'],
        ];
    @endphp

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6 text-center">
        @foreach ($products as $product)
            <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
                {{-- Gambar produk --}}
                <img src="{{ asset($product['image']) }}"
                     alt="{{ $product['name'] }}"
                     class="rounded-md mb-3 w-full h-40 object-cover">

                {{-- Nama & harga --}}
                <h3 class="text-gray-800 font-medium">{{ $product['name'] }}</h3>
                <p class="text-gray-500">
                    Rp {{ number_format($product['price'], 0, ',', '.') }}
                </p>

                {{-- Tombol / link detail produk --}}
                <a href="{{ route('productdetail', ['slug' => Str::slug($product['name'])]) }}"
                   class="mt-3 inline-block text-xs text-blue-600 hover:text-blue-800 font-medium">
                    Lihat Detail
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
