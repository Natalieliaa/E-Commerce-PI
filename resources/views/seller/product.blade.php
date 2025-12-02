@extends('layouts.seller')

@section('title', 'Produk Saya')

@section('content')
<div class="max-w-7xl mx-auto px-8 py-8">

    {{-- Header --}}
    <div class="mb-8 flex justify-between items-center" data-aos="fade-down">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Produk Saya</h1>
            <p class="text-gray-600 mt-2">Kelola semua produk yang Anda jual</p>
        </div>
        <a href="{{ route('seller.products.create') }}" class="flex items-center space-x-2 bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-3 rounded-lg hover:from-green-600 hover:to-green-700 transition shadow-lg">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            <span class="font-semibold">Tambah Produk</span>
        </a>
    </div>

    {{-- Products Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($products as $product)
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-lg transition group" data-aos="fade-up">
            {{-- Image --}}
            <div class="relative overflow-hidden h-48 bg-gray-100">
                <img src="{{ $product->gambar ? asset('storage/'.$product->gambar) : 'https://via.placeholder.com/300x200?text=No+Image' }}"
                     alt="{{ $product->nama_produk }}"
                     class="w-full h-full object-cover group-hover:scale-110 transition duration-300">

                {{-- Stock Badge --}}
                <div class="absolute top-3 right-3">
                    <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $product->stok > 10 ? 'bg-green-500 text-white' : ($product->stok > 0 ? 'bg-yellow-500 text-white' : 'bg-red-500 text-white') }}">
                        Stok: {{ $product->stok }}
                    </span>
                </div>
            </div>

            {{-- Content --}}
            <div class="p-4">
                <h3 class="font-bold text-gray-800 text-lg mb-2 line-clamp-2">{{ $product->nama_produk }}</h3>
                <p class="text-green-600 font-bold text-xl mb-3">Rp{{ number_format($product->harga, 0, ',', '.') }}</p>

                @if($product->deskripsi)
                <p class="text-gray-600 text-sm line-clamp-2 mb-4">{{ $product->deskripsi }}</p>
                @endif

                {{-- Actions --}}
                <div class="flex space-x-2">
                    <a href="{{ route('seller.products.edit', $product->id) }}" class="flex-1 px-3 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition text-center">
                        Edit
                    </a>
                    <button
                        onclick="confirmDelete({{ $product->id }}, '{{ $product->nama_produk }}', '{{ $product->gambar ? asset('storage/'.$product->gambar) : 'https://via.placeholder.com/100' }}')"
                        class="flex-1 px-3 py-2 bg-red-600 text-white text-sm font-semibold rounded-lg hover:bg-red-700 transition"
                    >
                        Hapus
                    </button>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-16">
            <svg class="w-24 h-24 mx-auto mb-4 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
            </svg>
            <p class="text-xl font-semibold text-gray-400 mb-2">Belum ada produk</p>
            <p class="text-gray-500 mb-6">Mulai tambahkan produk pertama Anda!</p>
            <a href="{{ route('seller.products.create') }}" class="inline-flex items-center space-x-2 bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                <span class="font-semibold">Tambah Produk</span>
            </a>
        </div>
        @endforelse
    </div>
</div>

{{-- Modal Konfirmasi Delete --}}
<div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-8 transform transition-all" data-aos="zoom-in">
        {{-- Icon Warning --}}
        <div class="flex justify-center mb-6">
            <div class="w-20 h-20 rounded-full bg-red-100 flex items-center justify-center">
                <svg class="w-12 h-12 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
            </div>
        </div>

        <h3 class="text-2xl font-bold text-gray-800 text-center mb-2">Hapus Produk?</h3>
        <p class="text-gray-600 text-center mb-6">
            Apakah Anda yakin ingin menghapus produk ini?
        </p>

        {{-- Product Preview --}}
        <div class="bg-gray-50 rounded-lg p-4 mb-6 flex items-center space-x-4">
            <img id="deleteProductImage" src="" alt="" class="w-16 h-16 object-cover rounded-lg">
            <div>
                <p id="deleteProductName" class="font-semibold text-gray-800"></p>
                <p class="text-sm text-gray-500">Produk akan dihapus permanen</p>
            </div>
        </div>

        {{-- Warning --}}
        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6">
            <div class="flex items-start">
                <svg class="w-5 h-5 text-yellow-600 mr-2 flex-shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
                <div class="text-sm text-yellow-800">
                    <p class="font-semibold mb-1">Perhatian!</p>
                    <p>Data yang sudah dihapus tidak dapat dikembalikan.</p>
                </div>
            </div>
        </div>

        <div class="flex space-x-3">
            <button onclick="closeDeleteModal()" class="flex-1 px-6 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-100 transition">
                Batal
            </button>
            <form id="deleteForm" method="POST" class="flex-1">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full px-6 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition shadow-lg">
                    Ya, Hapus
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function confirmDelete(productId, productName, productImage) {
        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('deleteProductName').textContent = productName;
        document.getElementById('deleteProductImage').src = productImage;
        document.getElementById('deleteForm').action = `/seller/products/${productId}`;
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    // Close modal when clicking outside
    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeDeleteModal();
        }
    });

    // Close modal with ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeDeleteModal();
        }
    });
</script>
@endsection
