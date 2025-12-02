@extends('template.main-template')

@section('content')

    @php
        // Kalau controller sudah kirim 'stock', pakai itu.
        // Kalau belum, fallback default 20.
        $stock = $product['stock'] ?? 20;
    @endphp

    <div class="max-w-6xl mx-auto p-8 bg-white rounded-xl shadow-lg mt-8">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

            {{-- Bagian Kiri: Gambar dan Info Harga --}}
            <div class="flex flex-col items-center">

                <div class="w-full max-w-sm rounded-lg overflow-hidden border border-gray-200 shadow-md mb-6">
                    @php $imgFile = $product['gambar'] ?? ''; @endphp
                    <img src="{{ asset('images/' . rawurlencode(basename($imgFile))) }}"
                         alt="{{ $product['nama'] }}"
                         class="w-full h-auto object-cover">
                </div>

                <div class="w-full max-w-sm text-center">
                    <h1 class="text-2xl font-bold text-gray-900 mb-1">{{ $product['nama'] }}</h1>

                    <p class="text-3xl font-extrabold text-gray-800 mb-2">
                        Rp {{ number_format($product['harga'], 0, ',', '.') }}
                    </p>

                    {{-- Stok --}}
                    <div class="mt-2 text-sm text-gray-600">
                        Stok: <span id="stockValue" class="font-semibold">{{ $stock }}</span> pcs
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="mt-6 space-y-3">
                        <button id="btnBuyNow"
                                class="w-full py-3 text-lg font-semibold text-white rounded-lg shadow-md hover:opacity-90 transition duration-200"
                                style="background-color: #934c26;">
                            Beli Sekarang
                        </button>

                        <button id="btnAddToCart"
                                class="w-full py-3 text-lg font-semibold text-gray-800 rounded-lg border-2 border-gray-300 hover:bg-gray-100 transition duration-200">
                            + Keranjang
                        </button>
                    </div>
                </div>
            </div>

            {{-- Bagian Kanan: Deskripsi dan Spesifikasi --}}
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Deskripsi</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    {{ $product['deskripsi'] }}
                </p>
            </div>
        </div>
    </div>

    {{-- Script untuk handle qty, stok, dan klik tombol --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const stock = {{ $stock }};   // stok maksimum
            let qty = 1;                  // jumlah awal

            // aman untuk dipakai di JS
            const productName = @json($product['nama']);
            const productSlug = @json(\Illuminate\Support\Str::slug($product['nama']));

            const qtyDisplay = document.getElementById('qtyDisplay');
            const btnPlus    = document.getElementById('qtyPlus');
            const btnMinus   = document.getElementById('qtyMinus');
            const btnCart    = document.getElementById('btnAddToCart');
            const btnBuyNow  = document.getElementById('btnBuyNow');

            function updateButtons() {
                btnMinus.disabled = qty <= 1;
                btnPlus.disabled  = qty >= stock;

                btnMinus.classList.toggle('opacity-50', qty <= 1);
                btnMinus.classList.toggle('cursor-not-allowed', qty <= 1);

                btnPlus.classList.toggle('opacity-50', qty >= stock);
                btnPlus.classList.toggle('cursor-not-allowed', qty >= stock);
            }

            btnPlus.addEventListener('click', function () {
                if (qty < stock) {
                    qty++;
                    qtyDisplay.textContent = qty;
                    updateButtons();
                }
            });

            btnMinus.addEventListener('click', function () {
                if (qty > 1) {
                    qty--;
                    qtyDisplay.textContent = qty;
                    updateButtons();
                }
            });

            btnCart.addEventListener('click', function () {
                alert('Berhasil menambahkan ' + qty + ' pcs ' + productName + ' ke keranjang (simulasi).');
            });

            // versi yang pakai slug ke /checkout
            btnBuyNow.addEventListener('click', function () {
                const url = "{{ route('checkout') }}" +
                    "?slug=" + encodeURIComponent(productSlug) +
                    "&qty=" + qty;

                window.location.href = url;
            });

            // set awal
            updateButtons();
        });
    </script>

@endsection
