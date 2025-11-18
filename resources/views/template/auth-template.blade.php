<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Login E-commerce Kerajinan Lokal')</title>

    {{-- Font Poppins dari Google Fonts untuk tampilan yang lebih modern --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;800&display=swap" rel="stylesheet">

    {{-- Tailwind CSS (jika dipakai untuk proyek lain) --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> --}}

    <style>
        /* Variabel Warna Estetis */
        :root {
            --bg-light-krem: #fcf4ec; /* Latar Belakang */
            --card-krem: #fcf8f5; /* Card/Form */
            --text-merah-tua: #72342b; /* Teks Heading / Branding */
            --input-border: #d4a993; /* Border Input */
            --btn-coklat: #934c26; /* Tombol Login */
            --btn-hover: #b46b3e; /* Hover Tombol */
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-light-krem);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .auth-container {
            display: flex;
            width: 90%;
            max-width: 1100px;
            align-items: center;
            justify-content: space-between;
        }

        /* Styling Form Card */
        .form-card {
            background-color: var(--card-krem);
            padding: 50px 40px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08); /* Shadow halus */
        }

        /* Styling Input */
        .input-field {
            width: 100%;
            padding: 12px;
            border: 2px solid var(--input-border);
            border-radius: 8px;
            box-sizing: border-box;
            background-color: transparent;
            transition: all 0.2s;
        }
        .input-field:focus {
            outline: none;
            border-color: var(--btn-coklat);
            box-shadow: 0 0 0 3px rgba(147, 76, 38, 0.2);
        }

        /* Styling Tombol */
        .login-btn {
            background-color: var(--btn-coklat);
            color: white;
            padding: 14px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-weight: 700;
            transition: background-color 0.2s;
        }
        .login-btn:hover {
            background-color: var(--btn-hover) !important;
        }

        /* Styling Teks Branding Kanan */
        .right-content {
            color: var(--text-merah-tua);
            font-size: 4.5rem;
            font-weight: 800;
            line-height: 1.05;
            text-align: left;
            margin-left: 50px;
            letter-spacing: -1px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.05);
        }

        /* Media Query untuk Mobile */
        @media (max-width: 768px) {
            .auth-container {
                flex-direction: column;
                justify-content: center;
                gap: 30px;
            }
            .right-content {
                display: none; /* Sembunyikan teks branding di mobile */
            }
        }
    </style>
</head>

<body>
    <div class="auth-container">
        @yield('content')
    </div>
</body>

</html>
