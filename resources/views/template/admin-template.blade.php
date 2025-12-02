<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --krem-sidebar: #fbeedc;
            --krem-tua-sidebar: #e9d5b8;
            --text-branding: #8b3a3c;
            --header-link: #7A3E10;
            --btn-approve: #934c26;
            --btn-reject: #e0e0e0;
            --table-header: #EEDBC8;
        }
        body { font-family: 'Poppins', sans-serif; }
        .text-branding { color: var(--text-branding); font-weight: 800; line-height: 1.1; }
        .sidebar-link { transition: background-color 0.2s; }
        .sidebar-link:hover { background-color: var(--krem-tua-sidebar); }
        .notify {
            position: fixed !important;
            top: 80px;
            right: 20px;
            z-index: 9999;
            animation: slideIn 0.3s ease-out;
        }
        @keyframes slideIn {
            from { transform: translateX(400px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
    </style>
</head>
<body class="bg-gray-50">

    <div class="flex h-screen">

        {{-- Sidebar (Admin) --}}
        <div class="w-64 bg-krem-sidebar p-6 flex flex-col border-r border-gray-200" style="background-color: var(--krem-sidebar);">
            <div class="text-3xl mb-10 text-branding leading-tight">
                ECOMMERCE<br>
                KERAJINAN<br>
                LOKAL<br>
                INDONESIA
            </div>

            <nav class="flex-grow">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center p-3 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'text-gray-900 font-bold' : 'text-gray-700 hover:text-gray-900' }} mb-2" style="{{ request()->routeIs('admin.dashboard') ? 'background-color: var(--krem-tua-sidebar);' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-10v10a1 1 0 001 1h3M12 4v16"/></svg>
                    Dashboard
                </a>

                <a href="{{ route('admin.sellers') }}" class="sidebar-link flex items-center p-3 rounded-lg {{ request()->routeIs('admin.sellers') ? 'text-gray-900 font-bold' : 'text-gray-700 hover:text-gray-900' }} mb-2" style="{{ request()->routeIs('admin.sellers') ? 'background-color: var(--krem-tua-sidebar);' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2h2m4 0V7m-4 4h.01M17 4h.01M12 4h.01"/></svg>
                    Data New Seller
                </a>

                <a href="{{ route('admin.users') }}" class="sidebar-link flex items-center p-3 rounded-lg {{ request()->routeIs('admin.users') ? 'text-gray-900 font-bold' : 'text-gray-700 hover:text-gray-900' }} mb-2" style="{{ request()->routeIs('admin.users') ? 'background-color: var(--krem-tua-sidebar);' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    Kelola User
                </a>

                <a href="{{ route('admin.products') }}" class="sidebar-link flex items-center p-3 rounded-lg {{ request()->routeIs('admin.products') ? 'text-gray-900 font-bold' : 'text-gray-700 hover:text-gray-900' }} mb-2" style="{{ request()->routeIs('admin.products') ? 'background-color: var(--krem-tua-sidebar);' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    Kelola Produk
                </a>

                <a href="#" class="sidebar-link flex items-center p-3 rounded-lg text-gray-700 hover:text-gray-900 mb-2">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37a1.724 1.724 0 002.572-1.065z"/></svg>
                    Pengaturan
                </a>

                <a href="#" class="sidebar-link flex items-center p-3 rounded-lg text-gray-700 hover:text-red-600">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    Delete Account
                </a>
            </nav>
        </div>

        {{-- Main Content Area --}}
        <div class="flex-1 overflow-auto">

            {{-- Navbar (Admin) --}}
            @include('components.admin-navbar')

            {{-- Success Notification --}}
            @if(session('success'))
            <div class="notify bg-green-100 border-l-4 border-green-500 text-green-700 px-6 py-4 rounded-lg shadow-lg max-w-md" role="alert">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            </div>
            @endif

            @if(session('error'))
            <div class="notify bg-red-100 border-l-4 border-red-500 text-red-700 px-6 py-4 rounded-lg shadow-lg max-w-md" role="alert">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
            </div>
            @endif

            {{-- Page Content --}}
            <main class="p-8">
                @yield('content')
            </main>
        </div>
    </div>

    {{-- AOS Script --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });

        // Auto hide notifications
        setTimeout(() => {
            const notify = document.querySelector('.notify');
            if (notify) {
                notify.style.animation = 'slideIn 0.3s ease-out reverse';
                setTimeout(() => notify.remove(), 300);
            }
        }, 4000);
    </script>
</body>
</html>
