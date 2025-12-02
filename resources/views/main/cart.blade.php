@extends('layouts.customer')

@section('title', 'Keranjang Belanja')
7
@section('content')
<div class="max-w-7xl mx-auto px-8 py-8">

    {{-- Header --}}
    <div class="mb-8" data-aos="fade-down">
        <h1 class="text-3xl font-bold text-gray-800">Keranjang Belanja 🛒</h1>
        <p class="text-gray-600 mt-2">Review produk sebelum checkout</p>
    </div>

    @if($cartItems->isEmpty())
        {{-- Empty Cart --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-16 text-center" data-aos="fade-up">
            <svg class="w-32 h-32 mx-auto mb-6 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
            <p class="text-2xl font-bold text-gray-400 mb-3">Keranjang Kosong</p>
            <p class="text-gray-500 mb-6">Belum ada produk di keranjang Anda</p>
            <a href="{{ route('customer.dashboard') }}" class="inline-flex items-center space-x-2 bg-purple-600 text-white px-8 py-3 rounded-lg hover:bg-purple-700 transition">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span class="font-semibold">Mulai Belanja</span>
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Cart Items --}}
            <div class="lg:col-span-2 space-y-4">
                @foreach($cartItems as $item)
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition" data-aos="fade-up">
                    <div class="flex items-start space-x-4">
                        {{-- Product Image --}}
                        <img src="{{ $item->product->gambar ? asset('storage/'.$item->product->gambar) : 'https://via.placeholder.com/120' }}"
                             alt="{{ $item->product->nama_produk }}"
                             class="w-28 h-28 object-cover rounded-lg border border-gray-200">

                        {{-- Product Info --}}
                        <div class="flex-1">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <h3 class="font-bold text-gray-800 text-lg mb-1">{{ $item->product->nama_produk }}</h3>
                                    <p class="text-sm text-gray-500">Seller: {{ $item->product->seller->name }}</p>
                                </div>
                                <button onclick="confirmRemove({{ $item->id }}, '{{ $item->product->nama_produk }}')" class="text-red-600 hover:text-red-800">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </div>

                            <p class="text-purple-600 font-bold text-xl mb-4">Rp{{ number_format($item->product->harga, 0, ',', '.') }}</p>

                            {{-- Quantity Control --}}
                            <div class="flex items-center space-x-4">
                                <form action="{{ route('customer.cart.update', $item->id) }}" method="POST" class="flex items-center space-x-2">
                                    @csrf
                                    @method('PUT')
                                    <label class="text-sm text-gray-600 font-medium">Jumlah:</label>
                                    <div class="flex items-center border border-gray-300 rounded-lg">
                                        <button type="button" onclick="decrementQty({{ $item->id }})" class="px-3 py-2 hover:bg-gray-100 transition">
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                            </svg>
                                        </button>
                                        <input type="number" name="quantity" id="qty-{{ $item->id }}" value="{{ $item->quantity }}" min="1" max="{{ $item->product->stok }}" class="w-16 text-center border-x border-gray-300 py-2 focus:outline-none" readonly>
                                        <button type="button" onclick="incrementQty({{ $item->id }}, {{ $item->product->stok }})" class="px-3 py-2 hover:bg-gray-100 transition">
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <button type="submit" class="px-4 py-2 bg-purple-600 text-white text-sm font-semibold rounded-lg hover:bg-purple-700 transition">
                                        Update
                                    </button>
                                </form>
                                <span class="text-sm text-gray-500">(Stok: {{ $item->product->stok }})</span>
                            </div>

                            {{-- Subtotal --}}
                            <div class="mt-4 pt-4 border-t border-gray-200">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Subtotal:</span>
                                    <span class="text-xl font-bold text-gray-800">Rp{{ number_format($item->product->harga * $item->quantity, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Order Summary --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 sticky top-8" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Ringkasan Belanja</h2>

                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between text-gray-600">
                            <span>Total Item</span>
                            <span class="font-semibold">{{ $cartItems->sum('quantity') }} item</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal</span>
                            <span class="font-semibold">Rp{{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Ongkir</span>
                            <span class="font-semibold text-green-600">Gratis</span>
                        </div>
                    </div>

                    <div class="pt-6 border-t-2 border-gray-200 mb-6">
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-semibold text-gray-800">Total Bayar</span>
                            <span class="text-2xl font-bold text-purple-600">Rp{{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <a href="{{ route('customer.checkout') }}" class="block w-full bg-gradient-to-r from-purple-500 to-purple-600 text-white text-center py-4 rounded-lg font-bold hover:from-purple-600 hover:to-purple-700 transition shadow-lg">
                        Lanjut ke Checkout
                    </a>

                    <a href="{{ route('customer.dashboard') }}" class="block w-full mt-3 border-2 border-gray-300 text-gray-700 text-center py-3 rounded-lg font-semibold hover:bg-gray-50 transition">
                        Lanjut Belanja
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>

{{-- Modal Remove Confirmation --}}
<div id="removeModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-8">
        <div class="flex justify-center mb-6">
            <div class="w-20 h-20 rounded-full bg-red-100 flex items-center justify-center">
                <svg class="w-12 h-12 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
            </div>
        </div>

        <h3 class="text-2xl font-bold text-gray-800 text-center mb-2">Hapus dari Keranjang?</h3>
        <p class="text-gray-600 text-center mb-6">
            Produk <strong id="removeProductName"></strong> akan dihapus dari keranjang
        </p>

        <div class="flex space-x-3">
            <button onclick="closeRemoveModal()" class="flex-1 px-6 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-100 transition">
                Batal
            </button>
            <form id="removeForm" method="POST" class="flex-1">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full px-6 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition">
                    Ya, Hapus
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function incrementQty(itemId, maxStock) {
        const input = document.getElementById(`qty-${itemId}`);
        let value = parseInt(input.value);
        if (value < maxStock) {
            input.value = value + 1;
        }
    }

    function decrementQty(itemId) {
        const input = document.getElementById(`qty-${itemId}`);
        let value = parseInt(input.value);
        if (value > 1) {
            input.value = value - 1;
        }
    }

    function confirmRemove(itemId, productName) {
        document.getElementById('removeModal').classList.remove('hidden');
        document.getElementById('removeProductName').textContent = productName;
        document.getElementById('removeForm').action = `/customer/cart/${itemId}`;
    }

    function closeRemoveModal() {
        document.getElementById('removeModal').classList.add('hidden');
    }
</script>
@endsection
