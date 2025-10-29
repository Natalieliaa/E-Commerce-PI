
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Learnify</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/heroicons@2.0.18/umd/heroicons.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    @notifyCss
    @vite('resources/css/app.css')

    <style>

      html {
        scroll-behavior: smooth;
}



    </style>
</head>
<body class="bg-white">


    @include('main.layouts.navbar-main')

        @yield('content')
</body>
</html>
