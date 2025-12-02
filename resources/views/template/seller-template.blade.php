<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Seller Dashboard')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Flowbite -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <!-- Flowbite Charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite-charts.min.js"></script>

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
    </style>
</head>

<body class="antialiased bg-gray-50 font-sans">

    {{-- Include Navbar Seller --}}

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
    <main class="min-h-screen">
        @yield('content')
    </main>

    {{-- Footer (Optional) --}}
    <footer class="bg-white border-t border-gray-200 py-6 mt-12">
        <div class="max-w-7xl mx-auto px-8 text-center text-gray-600 text-sm">
            <p>&copy; {{ date('Y') }} Seller Dashboard. All rights reserved.</p>
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
