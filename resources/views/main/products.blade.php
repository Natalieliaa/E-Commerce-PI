{{-- resources/views/landingPage/products.blade.php --}}
@extends('template.main-template')

@section('content')
<div class="bg-gray-100 py-12 px-6 md:px-20">
    @php use Illuminate\Support\Str; @endphp

    @if(isset($q) && $q !== '')
        <div class="mb-4 text-left">
            <strong>Hasil pencarian untuk "{{ e($q) }}"</strong> — {{ count($products) }} produk ditemukan.
        </div>
    @endif

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6 text-center">
        @forelse ($products as $product)
            <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
                {{-- Gambar produk --}}
                @php
                    $imgPath = $product['image'] ?? '';
                    if ($imgPath && ! \Illuminate\Support\Str::startsWith($imgPath, 'images/')) {
                        $imgPath = 'images/' . $imgPath;
                    }
                @endphp
                 <img src="{{ asset('images/' . rawurlencode(basename($imgPath))) }}"
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
        @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-600">Tidak ada produk ditemukan.</p>
                <a href="{{ route('products.page') }}" class="text-blue-600 mt-3 inline-block">Tampilkan semua produk</a>
            </div>
        @endforelse
    </div>
</div>
@endsection
