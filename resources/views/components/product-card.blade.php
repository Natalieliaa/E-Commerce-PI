<div class="w-full max-w-sm bg-white p-6 border rounded-lg shadow">

    <img src="{{ asset('images/' . rawurlencode(basename($gambar))) }}"
         class="rounded mb-4 w-full h-48 object-cover"
         alt="{{ $product->name }}">

    <h3 class="text-lg font-semibold mb-1">{{ $nama_produk }}</h3>

    <p class="text-xl font-bold text-gray-800 mb-3">
        Rp{{ number_format($harga, 0, ',', '.') }}
    </p>

    <a href="{{ route('product.product-detail', $id) }}"
       class="mt-3 inline-block text-sm text-blue-600 hover:text-blue-800 font-medium">
        Lihat Detail →
    </a>

</div>
