@extends('template.main-template')

@section('content')
    {{-- Hero Section --}}
    <section class="bg-[#FFF4E1] py-16 px-6 md:px-20 flex flex-col md:flex-row items-center justify-between">
        {{-- Text --}}
        <div class="flex-1 mb-10 md:mb-0" data-aos="fade-right">
            <h1 class="text-4xl md:text-5xl font-extrabold text-[#5A1E1E] leading-tight mb-6">
                ECOMMERCE <br>
                KERAJINAN LOKAL <br>
                INDONESIA
            </h1>
        </div>

        {{-- Image Carousel --}}
        <div class="flex-1 relative flex items-center justify-center gap-3" data-aos="fade-left">
            {{-- Tombol kiri --}}
            <button id="carouselPrev"
                class="absolute left-0 md:-left-8 bg-white p-2 rounded-full shadow hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            {{-- Container gambar --}}
            <div id="heroCarousel" class="flex gap-4 justify-center">
                <img src="{{ asset('images/lemari.jpg') }}"
                    class="w-28 h-40 md:w-32 md:h-48 rounded-lg object-cover"
                    alt="Lemari">
                <img src="{{ asset('images/bingkai foto.jpg') }}"
                    class="w-28 h-40 md:w-32 md:h-48 rounded-lg object-cover"
                    alt="Bingkai Foto">
                <img src="{{ asset('images/lukisan.jpg') }}"
                    class="w-28 h-40 md:w-32 md:h-48 rounded-lg object-cover"
                    alt="Lukisan">
                <img src="{{ asset('images/bunga kancing.jpg') }}"
                    class="w-28 h-40 md:w-32 md:h-48 rounded-lg object-cover"
                    alt="Bunga kancing">
                <img src="{{ asset('images/keranjang.jpg') }}"
                    class="w-28 h-40 md:w-32 md:h-48 rounded-lg object-cover"
                    alt="Keranjang">
                <img src="{{ asset('images/lemari buku.jpg') }}"
                    class="w-28 h-40 md:w-32 md:h-48 rounded-lg object-cover"
                    alt="Lemari Buku">
            </div>

            {{-- Tombol kanan --}}
            <button id="carouselNext"
                class="absolute right-0 md:-right-8 bg-white p-2 rounded-full shadow hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </section>

    {{-- Produk Section --}}
    <section class="bg-gray-100 py-12 px-6 md:px-20">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6 text-center">
            {{-- Produk 1 --}}
            <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
                <img src="{{ asset('images/storage.jpg') }}" alt="Storage"
                    class="rounded-md mb-3 w-full h-40 object-cover">
                <h3 class="text-gray-800 font-medium">Storage </h3>
                <p class="text-gray-500">Rp 120.000</p>
            </div>

            {{-- Produk 2 --}}
            <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
                <img src="{{ asset('images/craft lamp.jpg') }}" alt="Craft Lamp"
                    class="rounded-md mb-3 w-full h-40 object-cover">
                <h3 class="text-gray-800 font-medium">Craft Lamp</h3>
                <p class="text-gray-500">Rp 100.000</p>
            </div>

            {{-- Produk 3 --}}
            <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
                <img src="{{ asset('images/vas rotan.jpg') }}" alt="Vas Rotan"
                    class="rounded-md mb-3 w-full h-40 object-cover">
                <h3 class="text-gray-800 font-medium">Vas Rotan</h3>
                <p class="text-gray-500">Rp 100.000</p>
            </div>

            {{-- Produk 4 --}}
            <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
                <img src="{{ asset('images/meja.jpg') }}" alt="Meja kayu"
                    class="rounded-md mb-3 w-full h-40 object-cover">
                <h3 class="text-gray-800 font-medium">Meja</h3>
                <p class="text-gray-500">Rp 60.000</p>
            </div>

            {{-- Produk 5 --}}
            <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
                <img src="{{ asset('images/tas rotan.jpg') }}" alt="Tas Rotan"
                    class="rounded-md mb-3 w-full h-40 object-cover">
                <h3 class="text-gray-800 font-medium">Tas Rotan</h3>
                <p class="text-gray-500">Rp 50.000</p>
            </div>
        </div>
    </section>

    {{-- Animasi untuk carousel --}}
    <style>
        @keyframes slideInNext {
            from {
                opacity: 0;
                transform: translateX(20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInPrev {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .carousel-anim-next {
            animation: slideInNext 0.35s ease-out;
        }

        .carousel-anim-prev {
            animation: slideInPrev 0.35s ease-out;
        }
    </style>

    {{-- Script Carousel --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const images = Array.from(document.querySelectorAll('#heroCarousel img'));
            const total = images.length;
            const visibleCount = 3; // tampil 3 gambar
            let start = 0;
            let direction = 'next'; // untuk menentukan animasi

            function render() {
                images.forEach((img, index) => {
                    const isVisible = index >= start && index < start + visibleCount;

                    img.classList.remove('carousel-anim-next', 'carousel-anim-prev');

                    if (isVisible) {
                        img.classList.remove('hidden');

                        // paksa reflow supaya animasi bisa diputar ulang
                        void img.offsetWidth;

                        if (direction === 'next') {
                            img.classList.add('carousel-anim-next');
                        } else {
                            img.classList.add('carousel-anim-prev');
                        }
                    } else {
                        img.classList.add('hidden');
                    }
                });
            }

            if (total <= visibleCount) {
                images.forEach(img => img.classList.remove('hidden'));
                document.getElementById('carouselPrev').disabled = true;
                document.getElementById('carouselNext').disabled = true;
                return;
            }

            // tampilan awal
            render();

            document.getElementById('carouselNext').addEventListener('click', function () {
                direction = 'next';
                start = start + 1;
                if (start > total - visibleCount) {
                    start = 0; // balik ke awal
                }
                render();
            });

            document.getElementById('carouselPrev').addEventListener('click', function () {
                direction = 'prev';
                if (start === 0) {
                    start = total - visibleCount; // lompat ke ujung
                } else {
                    start = start - 1;
                }
                render();
            });
        });
    </script>
@endsection
