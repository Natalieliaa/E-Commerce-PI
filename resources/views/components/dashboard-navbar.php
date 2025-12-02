<nav class="bg-white border-b border-gray-200 shadow-sm px-4 py-2">
    <div class="max-w-7xl mx-auto flex items-center justify-between">

        <div class="flex items-center space-x-4">
            <a href="{{ url('/') }}">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="h-8">
            </a>
        </div>

        <div class="flex-1 mx-6">
            <form action="{{ route('products.page') }}" method="GET" class="relative">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-4 h-4 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8" />
                    <path d="M21 21l-4.35-4.35" />
                </svg>

                <input type="text" name="q"
                       placeholder="Cari disini"
                       class="w-full pl-10 pr-4 py-2 text-sm border border-gray-300 rounded-lg
                              focus:outline-none focus:ring-2 focus:ring-green-500">
            </form>
        </div>


        <div class="flex items-center space-x-6">


            <a href="#" class="relative text-gray-700 hover:text-green-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9m12-9l2 9m-6-4h.01M9 18h.01" />
                </svg>

                <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs w-5 h-5
                             flex items-center justify-center rounded-full">
                    14
                </span>
            </a>


            <a href="#" class="text-gray-700 hover:text-green-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15 17h5l-1.405-1.405A2.032 2.032 0
                             0118 14.158V11a6.002 6.002 0
                             00-4-5.659V5a2 2 0 10-4 0v.341C7.67
                             6.165 6 8.388 6 11v3.159c0 .538-.214
                             1.055-.595 1.436L4 17h5m6 0v1a3 3
                             0 11-6 0v-1m6 0H9" />
                </svg>
            </a>

            <button class="flex items-center space-x-2">
                <img src="{{ asset('profile.png') }}" alt="Profil"
                     class="h-8 w-8 rounded-full border">
            </button>

        </div>
    </div>
</nav>
