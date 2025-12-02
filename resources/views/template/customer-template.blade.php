<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Customer Dashboard')</title>

    {{-- Tailwind CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    {{-- AOS CSS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        html { scroll-behavior: smooth; }
        .notify {
            position: fixed !important;
            top: 80px;
            right: 20px;
            z-index: 9999;
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateX(400px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .cart-badge {
            animation: bounce 0.5s ease-in-out;
        }

        @keyframes bounce {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }
    </style>
</head>

<body class="antialiased bg-gray-50 font-sans">

    {{-- Include Navbar Customer --}}
    @include('components.customer-navbar')

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

    {{-- Error Notification --}}
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

    {{-- Main Content --}}
    <main class="min-h-screen pt-4">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-white border-t border-gray-200 py-8 mt-12">
        <div class="max-w-7xl mx-auto px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                {{-- About --}}
                <div>
                    <h3 class="text-lg font-bold text-gray-800 mb-4">🛍️ MyShop</h3>
                    <p class="text-gray-600 text-sm">Platform e-commerce terpercaya untuk kerajinan lokal Indonesia</p>
                </div>

                {{-- Quick Links --}}
                <div>
                    <h3 class="text-sm font-bold text-gray-800 mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('customer.dashboard') }}" class="text-gray-600 hover:text-purple-600">Beranda</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-purple-600">Produk</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-purple-600">Kategori</a></li>
                    </ul>
                </div>

                {{-- Customer Service --}}
                <div>
                    <h3 class="text-sm font-bold text-gray-800 mb-4">Layanan</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('customer.cart') }}" class="text-gray-600 hover:text-purple-600">Keranjang</a></li>
                        <li><a href="{{ route('customer.my-orders') }}" class="text-gray-600 hover:text-purple-600">Pesanan Saya</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-purple-600">Bantuan</a></li>
                    </ul>
                </div>

                {{-- Contact --}}
                <div>
                    <h3 class="text-sm font-bold text-gray-800 mb-4">Hubungi Kami</h3>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li>📧 support@myshop.com</li>
                        <li>📞 +62 812-3456-7890</li>
                        <li>📍 Jakarta, Indonesia</li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-200 mt-8 pt-6 text-center text-gray-600 text-sm">
                <p>&copy; {{ date('Y') }} MyShop. All rights reserved.</p>
            </div>
        </div>
    </footer>

    {{-- AOS Script --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });

        // Auto hide notifications after 4 seconds
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
