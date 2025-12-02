<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>a</title>

    {{-- Tailwind CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    {{-- AOS CSS (jika dipakai untuk animasi) --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        html { scroll-behavior: smooth; }
        .notify {
            position: fixed !important;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }

        .text-brown-800 { color: #4b2418; }
        .bg-brown-50 { background-color: #fdf8f6; }
        .bg-brown-800 { background-color: #4b2418; }
        .border-brown-700 { border-color: #6d3625; }
    </style>
</head>

<body class="antialiased bg-body text-body font-body bg-brown-50">
    @include('components.dashboard-navbar')
    @yield('content')

    {{-- AOS Script --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
