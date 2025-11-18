<nav class="bg-white border-b border-gray-200 shadow-sm rounded-lg m-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            {{-- Left Section --}}
            <div class="flex items-center space-x-8">

                {{-- Navigation Links --}}
                <div class="hidden md:flex items-center space-x-6">
  <a href="#" class="text-[#7A3E10] font-medium border-b-2 border-[#7A3E10] pb-1">Beranda</a>
<a href="{{ url('/products') }}" class="text-gray-600 hover:text-[#7A3E10]">
    Produk
</a>
</div>

            </div>

            {{-- Right Section --}}
            <div class="flex items-center space-x-5">
                {{-- Search Bar --}}
                <div class="relative flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400 absolute left-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8" />
                        <path d="M21 21l-4.35-4.35" />
                    </svg>
                    <input
                        type="text"
                        placeholder="Search"
                        class="pl-9 pr-3 py-1.5 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    />
                </div>

                {{-- Profile Image --}}
                <div class="w-9 h-9 rounded-full overflow-hidden border border-gray-300 cursor-pointer">
                    <img
                        src="https://i.pravatar.cc/40"
                        alt="Profile"
                        class="w-full h-full object-cover"
                    />
                </div>
            </div>
        </div>
    </div>
</nav>
