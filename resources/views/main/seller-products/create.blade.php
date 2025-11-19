@extends('template.main-template')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-4">Tambah Produk</h1>

    <form action="{{ route('seller.products.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="block mb-1">Nama Produk</label>
            <input name="nama_produk" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-3">
            <label class="block mb-1">Jenis</label>
            <input name="jenis_produk" class="w-full border p-2 rounded">
        </div>
        <div class="mb-3">
            <label class="block mb-1">Harga (angka)</label>
            <input name="harga" type="number" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-3">
            <label class="block mb-1">Stok</label>
            <input name="stock" type="number" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-3">
            <label class="block mb-1">Deskripsi</label>
            <textarea name="deskripsi" class="w-full border p-2 rounded"></textarea>
        </div>
        <button class="px-4 py-2 bg-green-600 text-white rounded">Simpan</button>
    </form>
</div>
@endsection
