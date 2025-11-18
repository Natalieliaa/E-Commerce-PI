<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Konfirmasi Seller</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --krem-sidebar: #fbeedc; /* Warna krem sidebar */
            --krem-tua-sidebar: #e9d5b8; /* Warna hover sidebar */
            --text-branding: #8b3a3c; /* Warna teks ECOMMERCE */
            --header-link: #7A3E10; /* Warna link navbar */
            --btn-approve: #934c26; /* Warna tombol Setujui */
            --btn-reject: #e0e0e0; /* Warna tombol Tolak */
            --table-header: #EEDBC8; /* Warna header tabel */
        }
        body { font-family: 'Poppins', sans-serif; }
        .text-branding { color: var(--text-branding); font-weight: 800; line-height: 1.1; }
        .sidebar-link { transition: background-color 0.2s; }
        .sidebar-link:hover { background-color: var(--krem-tua-sidebar); }
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
                <a href="#" class="sidebar-link flex items-center p-3 rounded-lg text-gray-700 hover:text-gray-900 mb-2">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-10v10a1 1 0 001 1h3M12 4v16"/></svg>
                    Dashboard
                </a>

                <a href="#" class="sidebar-link flex items-center p-3 rounded-lg text-gray-900 font-bold bg-krem-tua-sidebar" style="background-color: var(--krem-tua-sidebar);">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2h2m4 0V7m-4 4h.01M17 4h.01M12 4h.01"/></svg>
                    Data new Seller
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

            {{-- Page Content --}}
            <main class="p-8">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
