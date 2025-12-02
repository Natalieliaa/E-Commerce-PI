@extends('layouts.seller')

@section('title', 'Dashboard Seller')

@section('content')
<div class="max-w-7xl mx-auto px-8 py-8">

    {{-- Welcome Header --}}
    <div class="mb-8" data-aos="fade-down">
        <h1 class="text-4xl font-bold text-gray-800">Halo, {{ Auth::user()->name }}! 👋</h1>
        <p class="text-gray-600 mt-2 text-lg">Kelola toko dan pantau performa penjualan Anda</p>
    </div>

    {{-- Statistics Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">

        {{-- Total Produk --}}
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition" data-aos="fade-up">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium uppercase tracking-wide">Total Produk</p>
                    <h3 class="text-4xl font-bold text-gray-800 mt-2">{{ $totalProducts }}</h3>
                    <p class="text-green-600 text-sm mt-1 font-medium">+12 bulan ini</p>
                </div>
                <div class="bg-green-100 p-4 rounded-xl">
                    <svg class="w-10 h-10 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Total Stok --}}
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition" data-aos="fade-up" data-aos-delay="100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium uppercase tracking-wide">Total Stok</p>
                    <h3 class="text-4xl font-bold text-gray-800 mt-2">{{ $totalStok }}</h3>
                    <p class="text-blue-600 text-sm mt-1 font-medium">Unit tersedia</p>
                </div>
                <div class="bg-blue-100 p-4 rounded-xl">
                    <svg class="w-10 h-10 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Total Pesanan --}}
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition" data-aos="fade-up" data-aos-delay="200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium uppercase tracking-wide">Total Pesanan</p>
                    <h3 class="text-4xl font-bold text-gray-800 mt-2">{{ $totalOrders }}</h3>
                    <p class="text-purple-600 text-sm mt-1 font-medium">Pesanan masuk</p>
                </div>
                <div class="bg-purple-100 p-4 rounded-xl">
                    <svg class="w-10 h-10 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Total Pendapatan --}}
        <div class="bg-gradient-to-br from-green-500 to-green-600 p-6 rounded-xl shadow-lg text-white hover:shadow-xl transition" data-aos="fade-up" data-aos-delay="300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm font-medium uppercase tracking-wide">Total Pendapatan</p>
                    <h3 class="text-3xl font-bold mt-2">Rp{{ number_format($totalRevenue, 0, ',', '.') }}</h3>
                    <p class="text-green-100 text-sm mt-1 font-medium">💰 Revenue bulan ini</p>
                </div>
                <div class="bg-white bg-opacity-20 p-4 rounded-xl">
                    <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Quick Actions --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <a href="{{ route('seller.products.create') }}" class="group bg-gradient-to-r from-green-500 to-green-600 text-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1" data-aos="zoom-in">
            <div class="flex items-center space-x-4">
                <div class="bg-white bg-opacity-20 p-4 rounded-xl group-hover:scale-110 transition">
                    <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-2xl font-bold">Tambah Produk</h3>
                    <p class="text-green-100 text-sm mt-1">Unggah produk baru ke toko</p>
                </div>
            </div>
        </a>

        <a href="{{ route('seller.products') }}" class="group bg-gradient-to-r from-blue-500 to-blue-600 text-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1" data-aos="zoom-in" data-aos-delay="100">
            <div class="flex items-center space-x-4">
                <div class="bg-white bg-opacity-20 p-4 rounded-xl group-hover:scale-110 transition">
                    <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-2xl font-bold">Kelola Produk</h3>
                    <p class="text-blue-100 text-sm mt-1">Edit atau hapus produk</p>
                </div>
            </div>
        </a>

        <a href="{{ route('seller.orders') }}" class="group bg-gradient-to-r from-purple-500 to-purple-600 text-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1" data-aos="zoom-in" data-aos-delay="200">
            <div class="flex items-center space-x-4">
                <div class="bg-white bg-opacity-20 p-4 rounded-xl group-hover:scale-110 transition">
                    <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-2xl font-bold">Lihat Pesanan</h3>
                    <p class="text-purple-100 text-sm mt-1">Kelola pesanan masuk</p>
                </div>
            </div>
        </a>
    </div>

    {{-- Products List --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden" data-aos="fade-up">
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-8 py-6 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Produk Saya</h2>
                    <p class="text-gray-600 text-sm mt-1">Daftar semua produk yang Anda jual</p>
                </div>
                <a href="{{ route('seller.products') }}" class="text-green-600 hover:text-green-700 font-semibold flex items-center space-x-2 transition">
                    <span>Lihat Semua</span>
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="text-left py-4 px-6 font-semibold text-gray-700 text-sm uppercase tracking-wide">Gambar</th>
                        <th class="text-left py-4 px-6 font-semibold text-gray-700 text-sm uppercase tracking-wide">Nama Produk</th>
                        <th class="text-left py-4 px-6 font-semibold text-gray-700 text-sm uppercase tracking-wide">Harga</th>
                        <th class="text-left py-4 px-6 font-semibold text-gray-700 text-sm uppercase tracking-wide">Stok</th>
                        <th class="text-left py-4 px-6 font-semibold text-gray-700 text-sm uppercase tracking-wide">Status</th>
                        <th class="text-center py-4 px-6 font-semibold text-gray-700 text-sm uppercase tracking-wide">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($products->take(5) as $product)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-4 px-6">
                            <img src="{{ $product->gambar ? asset('storage/'.$product->gambar) : 'https://via.placeholder.com/80' }}"
                                 alt="{{ $product->nama_produk }}"
                                 class="w-20 h-20 object-cover rounded-lg shadow-sm">
                        </td>
                        <td class="py-4 px-6">
                            <p class="font-semibold text-gray-800 text-lg">{{ $product->nama_produk }}</p>
                            <p class="text-gray-500 text-sm mt-1">{{ Str::limit($product->deskripsi ?? 'Tidak ada deskripsi', 50) }}</p>
                        </td>
                        <td class="py-4 px-6">
                            <p class="text-green-600 font-bold text-lg">Rp{{ number_format($product->harga, 0, ',', '.') }}</p>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold {{ $product->stok > 10 ? 'bg-green-100 text-green-700' : ($product->stok > 0 ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">
                                {{ $product->stok }} unit
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-700">
                                ✓ Aktif
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex justify-center space-x-3">
                                <a href="{{ route('seller.products.edit', $product->id) }}" class="text-blue-600 hover:text-blue-800 transition" title="Edit">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                                <form action="{{ route('seller.products.delete', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 transition" title="Hapus">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-16">
                            <svg class="w-20 h-20 mx-auto mb-4 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                            <p class="text-xl font-semibold text-gray-400 mb-2">Belum ada produk</p>
                            <p class="text-gray-500 mb-4">Mulai tambahkan produk pertama Anda!</p>
                            <a href="{{ route('seller.products.create') }}" class="inline-flex items-center space-x-2 bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                <span class="font-semibold">Tambah Produk</span>
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
