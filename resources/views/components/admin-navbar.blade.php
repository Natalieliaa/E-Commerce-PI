<nav class="bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-full mx-auto px-8 sm:px-10 lg:px-12"> {{-- Lebar Full --}}
        <div class="flex justify-between h-16 items-center">

            {{-- Left Section (Nav Links) --}}
            <div class="flex items-center space-x-8">
                <div class="hidden md:flex items-center space-x-6">
                    <a href="#" class="text-header-link font-medium border-b-2 pb-1" style="color: var(--header-link); border-color: var(--header-link);">Beranda</a>
                    <a href="#" class="text-gray-600 hover:text-header-link">Produk</a>
                </div>
            </div>

            {{-- Right Section (Icons & Search) --}}
            <div class="flex items-center space-x-5">

                {{-- Icons: Cart & Chat (Menggunakan Tailwind Icons sederhana) --}}
                <svg class="w-6 h-6 text-gray-500 hover:text-gray-700 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                <svg class="w-6 h-6 text-gray-500 hover:text-gray-700 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 18h.01M16 18h.01"/></svg>

                {{-- Search Bar --}}
                <div class="relative flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 absolute left-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8" />
                        <path d="M21 21l-4.35-4.35" />
                    </svg>
                    <input
                        type="text"
                        placeholder="Search for a product"
                        class="pl-11 pr-3 py-2 text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-500"
                        style="width: 250px;"
                    />
                </div>

                {{-- Profile Icon (Menggunakan SVG untuk meniru tampilan gambar) --}}
                <div class="cursor-pointer">
                    <svg class="w-8 h-8 text-gray-700 hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </div>
            </div>
        </div>
    </div>
</nav>
