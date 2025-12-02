@extends('layouts.seller')

@section('title', 'Tambah Produk')

@section('content')
<div class="max-w-4xl mx-auto px-8 py-8">

    {{-- Header --}}
    <div class="mb-8" data-aos="fade-down">
        <div class="flex items-center space-x-3 mb-3">
            <a href="{{ route('seller.products') }}" class="text-gray-600 hover:text-gray-800 transition">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>
            <h1 class="text-3xl font-bold text-gray-800">Tambah Produk Baru</h1>
        </div>
        <p class="text-gray-600">Lengkapi informasi produk yang ingin Anda jual</p>
    </div>

    {{-- Form Card --}}
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden" data-aos="fade-up">
        <div class="bg-gradient-to-r from-green-500 to-green-600 px-8 py-6">
            <h2 class="text-2xl font-bold text-white">Informasi Produk</h2>
            <p class="text-green-100 text-sm mt-1">Pastikan semua informasi yang Anda masukkan akurat</p>
        </div>

        <form action="{{ route('seller.products.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
            @csrf

            {{-- Nama Produk --}}
            <div class="mb-6">
                <label for="nama_produk" class="block text-sm font-semibold text-gray-700 mb-2">
                    Nama Produk <span class="text-red-500">*</span>
                </label>
                <input
                    type="text"
                    id="nama_produk"
                    name="nama_produk"
                    value="{{ old('nama_produk') }}"
                    placeholder="Contoh: Tas Anyaman Rotan"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition @error('nama_produk') border-red-500 @enderror"
                />
                @error('nama_produk')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div class="mb-6">
                <label for="deskripsi" class="block text-sm font-semibold text-gray-700 mb-2">
                    Deskripsi Produk <span class="text-gray-400 text-xs">(Opsional)</span>
                </label>
                <textarea
                    id="deskripsi"
                    name="deskripsi"
                    rows="5"
                    placeholder="Jelaskan detail produk, bahan, ukuran, keunggulan, dll..."
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition @error('deskripsi') border-red-500 @enderror"
                >{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <p class="text-gray-500 text-xs mt-1">Deskripsi yang detail akan menarik lebih banyak pembeli</p>
            </div>

            {{-- Harga & Stok --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                {{-- Harga --}}
                <div>
                    <label for="harga" class="block text-sm font-semibold text-gray-700 mb-2">
                        Harga (Rp) <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-4 top-3.5 text-gray-500 font-medium">Rp</span>
                        <input
                            type="number"
                            id="harga"
                            name="harga"
                            value="{{ old('harga') }}"
                            placeholder="0"
                            min="0"
                            step="1000"
                            required
                            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition @error('harga') border-red-500 @enderror"
                        />
                    </div>
                    @error('harga')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Stok --}}
                <div>
                    <label for="stok" class="block text-sm font-semibold text-gray-700 mb-2">
                        Stok <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="number"
                        id="stok"
                        name="stok"
                        value="{{ old('stok') }}"
                        placeholder="0"
                        min="0"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition @error('stok') border-red-500 @enderror"
                    />
                    @error('stok')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Upload Gambar --}}
            <div class="mb-8">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Gambar Produk <span class="text-gray-400 text-xs">(Opsional)</span>
                </label>

                {{-- Preview Area --}}
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-green-500 transition">
                    <div id="imagePreviewContainer" class="hidden mb-4">
                        <img id="imagePreview" src="" alt="Preview" class="max-w-xs mx-auto rounded-lg shadow-md">
                    </div>

                    <div id="uploadPlaceholder">
                        <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <p class="text-gray-700 font-medium mb-1">Klik untuk upload atau drag & drop</p>
                        <p class="text-gray-500 text-sm">PNG, JPG, JPEG (Max. 2MB)</p>
                    </div>

                    <input
                        type="file"
                        id="gambar"
                        name="gambar"
                        accept="image/jpeg,image/png,image/jpg"
                        onchange="previewImage(event)"
                        class="hidden"
                    />

                    <button
                        type="button"
                        onclick="document.getElementById('gambar').click()"
                        class="mt-4 px-6 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition"
                    >
                        Pilih Gambar
                    </button>
                </div>

                @error('gambar')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            {{-- Buttons --}}
            <div class="flex space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('seller.products') }}" class="flex-1 px-6 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-100 transition text-center">
                    Batal
                </a>
                <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold rounded-lg hover:from-green-600 hover:to-green-700 transition shadow-lg">
                    Simpan Produk
                </button>
            </div>
        </form>
    </div>

    {{-- Tips Card --}}
    <div class="bg-blue-50 border-l-4 border-blue-500 rounded-lg p-6 mt-6" data-aos="fade-up" data-aos-delay="100">
        <div class="flex items-start">
            <svg class="w-6 h-6 text-blue-600 mr-3 flex-shrink-0 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <div>
                <h3 class="font-bold text-blue-800 mb-2">💡 Tips Produk Laris:</h3>
                <ul class="text-sm text-blue-700 space-y-1">
                    <li>• Gunakan nama produk yang jelas dan mudah dicari</li>
                    <li>• Tulis deskripsi detail dengan bahan, ukuran, dan keunggulan produk</li>
                    <li>• Upload foto berkualitas tinggi dengan pencahayaan yang baik</li>
                    <li>• Tentukan harga yang kompetitif dengan produk sejenis</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    // Preview Image
    function previewImage(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('imagePreview');
        const previewContainer = document.getElementById('imagePreviewContainer');
        const placeholder = document.getElementById('uploadPlaceholder');

        if (file) {
            // Validate file size (2MB)
            if (file.size > 2048000) {
                alert('Ukuran file terlalu besar! Maksimal 2MB');
                event.target.value = '';
                return;
            }

            // Validate file type
            const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            if (!validTypes.includes(file.type)) {
                alert('Format file tidak valid! Gunakan JPG, JPEG, atau PNG');
                event.target.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.classList.remove('hidden');
                placeholder.classList.add('hidden');
            }
            reader.readAsDataURL(file);
        }
    }

    // Format harga input
    const hargaInput = document.getElementById('harga');
    hargaInput.addEventListener('input', function(e) {
        // Remove non-numeric characters
        let value = this.value.replace(/[^0-9]/g, '');
        this.value = value;
    });
</script>
@endsection
