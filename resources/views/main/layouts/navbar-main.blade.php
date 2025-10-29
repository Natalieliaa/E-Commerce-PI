    <!-- Navbar (Tailwind Implementation) -->
    <nav class="flex justify-between items-center py-4 px-8 border-b border-gray-200 bg-white shadow-sm">
        <div class="nav-links flex space-x-5">
            {{-- <a href="{{ route('home') ?? '#' }}" class="text-gray-700 font-semibold hover:text-gray-900">Beranda</a> --}}
            {{-- <a href="{{ route('tampilan.produk') ?? '#' }}" class="text-gray-700 font-semibold hover:text-gray-900">Produk</a> --}}
        </div>

        <div class="flex items-center space-x-4">
            <!-- Ikon Keranjang & Chat -->
            <div class="flex gap-4">
                <!-- Icon Cart (Gunakan Ikon Lucide/Font Awesome Asli) -->
                <span class="text-gray-600 hover:text-primary-600 cursor-pointer text-xl">🛒</span>
                <!-- Icon Chat -->
                <span class="text-gray-600 hover:text-primary-600 cursor-pointer text-xl">💬</span>
            </div>

            <!-- Search Bar -->
            <div class="flex items-center border border-gray-300 rounded-full py-1.5 px-4 bg-gray-50 focus-within:border-primary-500 transition duration-150">
                <input type="text" placeholder="Search for a product" class="border-none outline-none p-1 w-64 bg-transparent text-sm placeholder-gray-500">
                <!-- Icon Search -->
                <span class="text-gray-500 text-lg ml-2 cursor-pointer">🔍</span>
            </div>

            <!-- Icon User -->
            <div class="ml-4">
                <span class="text-gray-600 hover:text-primary-600 cursor-pointer text-2xl">👤</span>
            </div>
        </div>
    </nav>
