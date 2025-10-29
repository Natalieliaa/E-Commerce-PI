@extends('template.main-template')

@section('content')
    <div class="hero-section">
        <div class="hero-text">
            <h1>ECOMMERCE KERAJINAN LOKAL INDONESIA</h1>
            <a href="{{ route('auth.page') ?? '#' }}" class="hero-button">Login/Sign up</a>
        </div>
        <div class="hero-slider">
            <img src="https://via.placeholder.com/150x200/F5DEB3/8B4513?text=Anyaman" alt="Keranjang Kecil" class="slider-image">
            <img src="https://via.placeholder.com/250x300/B8860B/FFFFFF?text=Keranjang+Besar" alt="Keranjang Utama" class="slider-image main">
            <button class="slider-control" aria-label="Previous"></button>
        </div>
    </div>

    <div class="product-grid">
        <div class="product-list">
            @php
                // Data produk (simulasi)
                $products = [
                    ['name' => 'Storage Basket', 'price' => 'Rp 120.000', 'image' => 'https://via.placeholder.com/180/EEDD82/333?text=Basket'],
                    ['name' => 'Craft Lamp', 'price' => 'Rp 100.000', 'image' => 'https://via.placeholder.com/180/CD853F/333?text=Lamp'],
                    ['name' => 'Vas Rotan', 'price' => 'Rp 100.000', 'image' => 'https://via.placeholder.com/180/F4A460/333?text=Vase'],
                    ['name' => 'Container Storage', 'price' => 'Rp 60.000', 'image' => 'https://via.placeholder.com/180/D2B48C/333?text=Storage'],
                    ['name' => 'Tas Rotan', 'price' => 'Rp 50.000', 'image' => 'https://via.placeholder.com/180/8B4513/FFF?text=Bag'],
                ];
            @endphp

            @foreach ($products as $product)
                <div class="product-card">
                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="product-card-image">
                    <p>{{ $product['name'] }}</p>
                    <p class="price">{{ $product['price'] }}</p>
                </div>
            @endforeach
        </div>

        <div class="separator"></div>
    </div>
@endsection
