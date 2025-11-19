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
                    @php $imgFile = $product['image'] ?? ''; @endphp
                    <img src="{{ asset('images/' . rawurlencode(basename($imgFile))) }}"
                         alt="{{ $product['name'] }}"
                         class="w-full h-auto object-cover">
                </div>

                <div class="w-full max-w-sm text-center">
                    <h1 class="text-2xl font-bold text-gray-900 mb-1">{{ $product['name'] }}</h1>

                    <p class="text-3xl font-extrabold text-gray-800 mb-2">
                        Rp {{ number_format($product['price'], 0, ',', '.') }}
                    </p>

                    {{-- Rating + terjual --}}
                    <div class="flex items-center justify-center text-sm text-gray-500">
                        <svg class="w-4 h-4 mr-1 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.963a1 1 0 00.95.69h4.17c.969 0 1.371 1.24.588 1.81l-3.374 2.454a1 1 0 00-.364 1.118l1.286 3.963c.3.921-.755 1.688-1.54 1.118l-3.374-2.454a1 1 0 00-1.176 0l-3.374 2.454c-.784.57-1.84-.197-1.54-1.118l1.286-3.963a1 1 0 00-.364-1.118L2.091 9.39c-.783-.57-.381-1.81.588-1.81h4.17a1 1 0 00.95-.69l1.286-3.963z"></path>
                        </svg>
                        <span class="mr-3">4.8</span> |
                        <span class="ml-3">1,4RB Terjual</span>
                    </div>

                    {{-- Stok --}}
                    <div class="mt-2 text-sm text-gray-600">
                        Stok: <span id="stockValue" class="font-semibold">{{ $stock }}</span> pcs
                    </div>

                    {{-- Kontrol jumlah + / - --}}
                    <div class="mt-4 flex items-center justify-center gap-3">
                        <button id="qtyMinus"
                                class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-full text-lg font-bold text-gray-700 hover:bg-gray-100">
                            −
                        </button>
                        <span id="qtyDisplay" class="min-w-[2rem] text-lg font-semibold text-gray-900">1</span>
                        <button id="qtyPlus"
                                class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-full text-lg font-bold text-gray-700 hover:bg-gray-100">
                            +
                        </button>
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
                    Tambahkan sentuhan etnik yang elegan pada gaya harianmu dengan tas rotan bulat handmade ini! Dibuat
                    dengan tangan oleh pengrajin lokal, tas ini menggabungkan keindahan anyaman tradisional dan desain
                    modern yang unik.
                </p>

                <h3 class="text-2xl font-semibold text-gray-800 mb-3">Spesifikasi Produk:</h3>
                <ul class="list-none space-y-2 text-gray-700 mb-6 pl-0">
                    <li class="flex items-start">
                        <span class="text-xl mr-2">🧶</span>
                        <span><strong>Bahan:</strong> Rotan alami pilihan berkualitas tinggi</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-xl mr-2">🎨</span>
                        <span><strong>Warna:</strong> Cokelat alami dengan detail anyaman motif unik</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-xl mr-2">👜</span>
                        <span><strong>Model:</strong> Tas selempang bulat (round bag)</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-xl mr-2">📏</span>
                        <span><strong>Ukuran:</strong> Diameter sekitar 20 cm, ketebalan sekitar 7 cm</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-xl mr-2">🦋</span>
                        <span><strong>Lapisan dalam:</strong> Kain batik/kanvas lembut (warna dapat bervariasi)</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-xl mr-2">🔒</span>
                        <span><strong>Penutup:</strong> Kancing pengait kulit sintetis</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-xl mr-2">🎗️</span>
                        <span><strong>Tali:</strong> Tali kulit sintetis kuat dan nyaman dipakai</span>
                    </li>
                </ul>

                <h3 class="text-2xl font-semibold text-gray-800 mb-3">Kelebihan:</h3>
                <ul class="list-disc space-y-2 text-gray-700 pl-6">
                    <li>Ringan dan mudah dibawa</li>
                    <li>Cocok untuk outfit kasual maupun semi-formal</li>
                    <li>Handmade – setiap tas memiliki ciri khas tersendiri</li>
                    <li>Ramah lingkungan 🌿</li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Script untuk handle qty, stok, dan klik tombol --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const stock = {{ $stock }};   // stok maksimum
            let qty = 1;                  // jumlah awal

            // aman untuk dipakai di JS
            const productName = @json($product['name']);
            const productSlug = @json(\Illuminate\Support\Str::slug($product['name']));

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
