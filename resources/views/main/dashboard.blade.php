@extends('template.main-template')

@section('content')

    <div class="max-w-4xl mx-auto p-8 bg-white rounded-xl shadow-lg mt-8">

        {{-- Judul Halaman --}}
        <h1 class="text-3xl font-bold text-gray-900 mb-6 flex items-center">
            <svg class="w-8 h-8 mr-3 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            Melakukan Checkout Produk
        </h1>

        {{-- Informasi produk yang dikirim dari halaman detail (jika ada) --}}
        @if (!empty($productName))
            <div class="mb-6 p-4 border border-emerald-200 rounded-lg bg-emerald-50">
                <p class="text-gray-700">Kamu akan membeli:</p>
                <p class="text-xl font-semibold text-gray-900 mt-1">
                    {{ $productName }} ({{ $qty }} pcs)
                </p>
            </div>
        @endif

        <form method="POST" action="{{ route('checkout.submit') }}">
            @csrf

            {{-- Contoh data keranjang dummy --}}
            @php
                $checkoutItems = [
                    ['id' => 1, 'name' => 'Tas Kayu',  'price' => 150000, 'stock' => 10, 'qty' => 1, 'rating' => 4.7, 'image' => 'tas_kayu.jpg'],
                    ['id' => 2, 'name' => 'Meja Kayu', 'price' => 200000, 'stock' =>  5, 'qty' => 1, 'rating' => 4.8, 'image' => 'meja_kayu.jpg'],
                ];
                $totalPrice = 350000;
            @endphp

            {{-- 1. Detail pesanan --}}
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Detail Pesanan Anda</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8 border-b pb-6">
                @foreach ($checkoutItems as $item)
                    <div class="flex items-start p-3 border border-gray-200 rounded-lg bg-gray-50">
                        <img src="{{ asset('images/' . rawurlencode(basename($item['image']))) }}"
                            alt="{{ $item['name'] }}"
                            class="w-20 h-20 object-cover rounded-md shadow-sm mr-3">
                        <div class="flex-grow">
                            <div class="flex justify-between items-start">
                                <h3 class="text-lg font-semibold text-gray-900">{{ $item['name'] }}</h3>
                                <span class="text-sm text-yellow-500 flex items-center ml-2">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.963a1 1 0 00.95.69h4.17c.969 0 1.371 1.24.588 1.81l-3.374 2.454a1 1 0 00-.364 1.118l1.286 3.963c.3.921-.755 1.688-1.54 1.118l-3.374-2.454a1 1 0 00-1.176 0l-3.374 2.454c-.784.57-1.84-.197-1.54-1.118l1.286-3.963a1 1 0 00-.364-1.118L2.091 9.39c-.783-.57-.381-1.81.588-1.81h4.17a1 1 0 00.95-.69l1.286-3.963z">
                                        </path>
                                    </svg>
                                    {{ $item['rating'] }}
                                </span>
                            </div>
                            <p class="text-md font-medium text-gray-700">
                                Harga: Rp {{ number_format($item['price'], 0, ',', '.') }}
                            </p>
                            <p class="text-sm text-gray-500">Stok tersedia: {{ $item['stock'] }} pcs</p>
                            <p class="text-sm text-gray-500">Jumlah: {{ $item['qty'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- 2. Alamat pengiriman --}}
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Alamat Pengiriman</h2>
            <div class="mb-8">
                <textarea name="shipping_address" rows="4"
                          class="w-full p-3 border border-gray-400 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-600"
                          placeholder="Masukkan alamat lengkap pengiriman" required>Jln Melati No.4</textarea>
            </div>

            {{-- 3. Metode pembayaran --}}
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Metode Pembayaran</h2>
            <div class="mb-8">
                <select name="payment_method"
                        class="w-full p-3 border border-gray-400 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-600 appearance-none bg-white"
                        required>
                    <option value="" selected disabled>-- Pilih Metode --</option>
                    <option value="transfer_bank">Transfer Bank</option>
                    <option value="e_wallet">E-Wallet</option>
                </select>
            </div>

            {{-- 4. Catatan --}}
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Catatan untuk Penjual</h2>
            <div class="mb-10">
                <textarea name="seller_notes" rows="3"
                          class="w-full p-3 border border-gray-400 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-600"
                          placeholder="Opsional: Tambahkan catatan khusus untuk penjual.">
Tolong ditambahkan tulisan "Selamat ulang tahun ibu"
                </textarea>
            </div>

            {{-- 5. Total & tombol --}}
            <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 pt-4 border-t border-gray-300">
                <span class="text-2xl font-extrabold text-gray-900">
                    Total Pembayaran: Rp {{ number_format($totalPrice, 0, ',', '.') }}
                </span>

                <button type="submit"
                        class="px-8 py-3 text-lg font-bold text-white rounded-lg shadow-md hover:opacity-90 transition duration-150"
                        style="background-color: #934c26;">
                    Buat Pesanan
                </button>
            </div>
        </form>

    </div>

@endsection
