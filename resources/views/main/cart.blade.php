@extends('template.main-template')

@section('content')

    <div class="max-w-4xl mx-auto p-8 bg-white rounded-xl shadow-lg mt-8">

        <h1 class="text-3xl font-bold text-gray-900 mb-8 flex items-center">
            <svg class="w-8 h-8 mr-3 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
            Keranjang Belanja
        </h1>

        <form method="POST" action="{{ route('checkout.process') }}">
            @csrf

            {{-- Daftar Produk di Keranjang --}}
            <div class="space-y-8 mb-8 border-b border-gray-200 pb-8">

                @php
                    $cartItems = [
                        ['id' => 1, 'name' => 'Tas Kayu', 'price' => 150000, 'stock' => 10, 'qty' => 1, 'rating' => 4.7, 'image' => 'tas_kayu.jpg'],
                        ['id' => 2, 'name' => 'Meja Kayu', 'price' => 200000, 'stock' => 5, 'qty' => 1, 'rating' => 4.8, 'image' => 'meja_kayu.jpg'],
                    ];
                @endphp

                @foreach ($cartItems as $item)
                <div class="flex items-start p-4 border border-gray-200 rounded-lg bg-gray-50">

                    {{-- Checkbox Pilih Item --}}
                    <input type="checkbox" name="selected_items[]" value="{{ $item['id'] }}"
                           checked class="w-6 h-6 text-red-600 rounded border-gray-300 focus:ring-red-500 mr-4 mt-1" onchange="updateTotal()">

                    {{-- Gambar Produk --}}
                    <div class="flex-shrink-0 mr-4">
                        <img src="{{ asset('images/' . rawurlencode(basename($item['image']))) }}" alt="{{ $item['name'] }}" class="w-24 h-24 object-cover rounded-md shadow-sm">
                    </div>

                    {{-- Detail Item --}}
                    <div class="flex-grow">
                        <div class="flex justify-between items-center mb-1">
                            <h2 class="text-xl font-semibold text-gray-900">{{ $item['name'] }}</h2>
                            <span class="text-sm text-yellow-500 flex items-center ml-4">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.963a1 1 0 00.95.69h4.17c.969 0 1.371 1.24.588 1.81l-3.374 2.454a1 1 0 00-.364 1.118l1.286 3.963c.3.921-.755 1.688-1.54 1.118l-3.374-2.454a1 1 0 00-1.176 0l-3.374 2.454c-.784.57-1.84-.197-1.54-1.118l1.286-3.963a1 1 0 00-.364-1.118L2.091 9.39c-.783-.57-.381-1.81.588-1.81h4.17a1 1 0 00.95-.69l1.286-3.963z"></path></svg>
                                {{ $item['rating'] }}
                            </span>
                        </div>

                        <p class="text-lg font-medium text-gray-700">Harga: Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                        <p class="text-sm text-gray-500">Stok tersedia: {{ $item['stock'] }} pcs</p>

                        <div class="flex items-center mt-3">
                            <label for="qty_{{ $item['id'] }}" class="text-sm text-gray-600 mr-2">Jumlah:</label>
                            <input type="number" name="qty[{{ $item['id'] }}]" id="qty_{{ $item['id'] }}" value="{{ $item['qty'] }}"
                                   min="1" max="{{ $item['stock'] }}" data-price="{{ $item['price'] }}"
                                   class="w-16 p-1 border border-gray-400 rounded-md text-center quantity-input" onchange="updateTotal()">
                        </div>
                    </div>

                    {{-- Tombol Lihat Detail (Di Sisi Kanan Atas) --}}
                    <a href="{{ route('product.detail', ['id' => $item['id']]) }}" class="text-xs text-white bg-gray-700 hover:bg-gray-800 px-3 py-1 rounded-md">
                        Lihat Detail
                    </a>
                </div>
                @endforeach

            </div> {{-- End Daftar Produk --}}

            {{-- Footer Keranjang (Total dan Checkout) --}}
            <div class="flex justify-between items-center pt-4">

                <div class="flex items-center space-x-3">
                    <input type="checkbox" id="select-all" class="w-5 h-5 text-red-600 rounded border-gray-300 focus:ring-red-500" onchange="toggleAll(this)">
                    <label for="select-all" class="text-lg font-medium text-gray-700">Semua</label>
                </div>

                <div class="flex items-center space-x-6">
                    <span class="text-xl font-medium text-gray-800">Total</span>
                    <span id="total-price" class="text-2xl font-extrabold text-gray-900">Rp 350.000</span>

                    <button type="submit" class="px-8 py-3 text-lg font-bold text-white rounded-lg shadow-md hover:opacity-90 transition duration-150" style="background-color: #934c26;">
                        Checkout
                    </button>
                </div>
            </div>
        </form>

    </div>

@endsection

@push('scripts')
<script>
    // Fungsi untuk memformat angka menjadi format mata uang Rupiah
    const formatRupiah = (number) => {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(number);
    };

    function updateTotal() {
        let total = 0;
        const items = document.querySelectorAll('.quantity-input');
        const selectAllCheckbox = document.getElementById('select-all');
        let allChecked = true;

        items.forEach(input => {
            const checkbox = input.closest('.flex.items-start').querySelector('input[type="checkbox"]');

            if (checkbox.checked) {
                const price = parseFloat(input.getAttribute('data-price'));
                const quantity = parseInt(input.value);
                total += price * quantity;
            } else {
                allChecked = false;
            }
        });

        document.getElementById('total-price').textContent = formatRupiah(total);
        // Menjaga agar checkbox 'Semua' sinkron
        if (selectAllCheckbox) {
            selectAllCheckbox.checked = allChecked;
        }
    }

    function toggleAll(source) {
        const checkboxes = document.querySelectorAll('input[name="selected_items[]"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = source.checked;
        });
        updateTotal();
    }

    // Event listener untuk inisialisasi dan perubahan
    document.addEventListener('DOMContentLoaded', function() {
        // Attach listeners to all relevant inputs
        const inputs = document.querySelectorAll('.quantity-input, input[name="selected_items[]"]');
        inputs.forEach(input => {
            input.addEventListener('change', updateTotal);
        });

        // Panggil pertama kali untuk menghitung total awal
        updateTotal();
    });
</script>
@endpush
