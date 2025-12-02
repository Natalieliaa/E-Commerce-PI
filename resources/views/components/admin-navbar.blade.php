<nav class="bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-full mx-auto px-8 sm:px-10 lg:px-12">
        <div class="flex justify-between h-16 items-center">

            {{-- Left Section (Nav Links) --}}
            <div class="flex items-center space-x-8">
                <div class="hidden md:flex items-center space-x-6">
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'text-header-link font-medium border-b-2 pb-1' : 'text-gray-600 hover:text-header-link' }}" style="{{ request()->routeIs('admin.dashboard') ? 'color: var(--header-link); border-color: var(--header-link);' : '' }}">Dashboard</a>
                    <a href="{{ route('admin.users') }}" class="{{ request()->routeIs('admin.users') ? 'text-header-link font-medium border-b-2 pb-1' : 'text-gray-600 hover:text-header-link' }}" style="{{ request()->routeIs('admin.users') ? 'color: var(--header-link); border-color: var(--header-link);' : '' }}">Kelola User</a>
                    <a href="{{ route('admin.products') }}" class="{{ request()->routeIs('admin.products') ? 'text-header-link font-medium border-b-2 pb-1' : 'text-gray-600 hover:text-header-link' }}" style="{{ request()->routeIs('admin.products') ? 'color: var(--header-link); border-color: var(--header-link);' : '' }}">Kelola Produk</a>
                    <a href="{{ route('admin.sellers') }}" class="{{ request()->routeIs('admin.sellers') ? 'text-header-link font-medium border-b-2 pb-1' : 'text-gray-600 hover:text-header-link' }}" style="{{ request()->routeIs('admin.sellers') ? 'color: var(--header-link); border-color: var(--header-link);' : '' }}">Data Seller</a>
                </div>
            </div>

            {{-- Right Section (Icons & Search) --}}
            <div class="flex items-center space-x-5">

                {{-- Notification Bell --}}
                <div class="relative cursor-pointer">
                    <svg class="w-6 h-6 text-gray-500 hover:text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">3</span>
                </div>

                {{-- Search Bar --}}
                <div class="relative flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 absolute left-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8" />
                        <path d="M21 21l-4.35-4.35" />
                    </svg>
                    <input
                        type="text"
                        placeholder="Cari user, produk..."
                        class="pl-11 pr-3 py-2 text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-500"
                        style="width: 250px;"
                    />
                </div>

                {{-- Profile Dropdown --}}
                <div class="relative group">
                    <div class="flex items-center space-x-2 cursor-pointer">
                        <svg class="w-8 h-8 text-gray-700 hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <span class="text-sm font-medium text-gray-700">{{ Auth::user()->name }}</span>
                    </div>

                    {{-- Dropdown Menu --}}
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 hidden group-hover:block z-50">
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profil</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Pengaturan</a>
                        <hr class="my-1">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-50">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
