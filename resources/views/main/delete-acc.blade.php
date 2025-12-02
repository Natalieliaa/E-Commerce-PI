@extends('layouts.app')

@section('title', 'Hapus Akun Customer | E-commerce Kerajinan Lokal')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* --- Variabel Warna --- */
        :root {
            --primary-color: #A9684C; /* Cokelat Utama */
            --background-color: #F8F4E9;
            --button-dark: #8B4513;
            --button-green: #4CAF50;
            --text-color: #333;
            --border-color: #ddd;
            --warning-bg: #FFF8E1; /* Kuning Muda untuk peringatan */
            --warning-border: #FFC107; /* Kuning Tua untuk border peringatan */
        }

        /* Styling dasar yang biasanya ada di layouts.app */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--background-color);
            display: flex;
            min-height: 100vh;
        }

        /* --- Main Content Area (Modifikasi untuk Fullscreen) --- */
        .main-content {
            margin-left: 0;
            padding: 30px 50px;
            width: 100%;
            min-height: 100vh;
        }

        /* --- Top Navigation --- */
        .top-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 50px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border-color);
        }

        .nav-left {
            display: flex;
            gap: 40px;
        }

        .nav-left a {
            color: #333;
            text-decoration: none;
            font-size: 18px;
            font-weight: 500;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .icon-btn {
            background: none;
            border: none;
            font-size: 26px;
            cursor: pointer;
            color: var(--button-dark);
        }

        .search-container {
            display: flex;
            align-items: center;
            background: white;
            border: 1px solid #ddd;
            border-radius: 30px;
            padding: 8px 20px;
            gap: 10px;
        }

        .search-container input {
            border: none;
            outline: none;
            font-size: 14px;
            width: 250px;
        }

        /* --- Delete Account Styles --- */

        .page-title {
            color: var(--text-color);
            font-size: 32px;
            margin-bottom: 50px;
        }

        .delete-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding-top: 100px;
        }

        .warning-card {
            background-color: var(--warning-bg);
            border: 1px solid var(--warning-border);
            padding: 30px 50px;
            border-radius: 12px;
            margin-bottom: 40px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            max-width: 500px;
        }

        .warning-card p {
            font-size: 20px;
            font-style: italic;
            color: var(--button-dark);
            font-weight: 500;
        }

        .btn-delete {
            padding: 15px 40px;
            background-color: var(--button-dark); /* Cokelat Tua */
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 0 #6B3410; /* Efek 3D */
            margin-bottom: 30px;
        }

        .btn-delete:hover {
            background-color: var(--primary-color);
            box-shadow: 0 2px 0 #6B3410;
            transform: translateY(2px);
        }

        .email-notice {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: #666;
        }
        .email-notice i {
            font-size: 20px;
            color: var(--primary-color);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-content {
                padding: 20px;
            }
            .top-nav {
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Main Content -->
    <main class="main-content">
        <!-- Top Navigation -->
        <nav class="top-nav">
            <div class="nav-left">
                <a href="{{ route('home') }}">Beranda</a>
                <a href="{{ route('products') }}">Produk</a>
            </div>
            <div class="nav-right">
                <button class="icon-btn" title="Keranjang"><i class="fas fa-shopping-cart"></i></button>
                <button class="icon-btn" title="Chat"><i class="fas fa-comment"></i></button>
                <div class="search-container">
                    <input type="text" placeholder="Cari produk...">
                    <i class="fas fa-search"></i>
                </div>
                <button class="icon-btn" title="Profil Pengguna"><i class="fas fa-user-circle"></i></button>
            </div>
        </nav>

        <!-- Delete Account Content -->
        <h1 class="page-title">Hapus Akun Customer</h1>

        <div class="delete-container">

            <div class="warning-card">
                <p>Dengan menghapus akun, semua riwayat pesanan dan data Anda akan hilang secara permanen.</p>
            </div>

            <!-- Form untuk mengajukan penghapusan akun -->
            <form action="{{ route('customer.submit_delete') }}" method="POST">
                <!-- @csrf -->
                <button type="submit" class="btn-delete">Konfirmasi Hapus Akun</button>
            </form>

            <div class="email-notice">
                <i class="fas fa-envelope"></i>
                <span>Email konfirmasi akan dikirim ke email terdaftar untuk verifikasi akhir.</span>
            </div>
        </div>
    </main>
@endsection
