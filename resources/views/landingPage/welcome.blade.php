@extends('template.main-template')



@section('content')

<div>

    <section class="mb-20">

        <div class="container mx-auto px-4 relative">

            <div class="max-w-xl mx-auto mb-12 text-center">

                <h1 class="mt-10 font-heading text-6xl tracking-tight mb-5 font-semibold text-brown-800">

                    E-COMMERCE KERAJINAN LOKAL INDONESIA

                </h1>

            </div>



            <div>

                <div class="flex justify-center gap-4">

                    <a href="{{ route('login') }}"

                        class="inline-flex py-4 px-6 items-center justify-center text-lg font-medium text-brown-800 border border-brown-700 hover:bg-brown-700 hover:text-brown-600 rounded-full transition duration-200">

                        Login

                    </a>

                    <a href="{{ route('register') }}"

                        class="inline-flex py-4 px-6 items-center justify-center text-lg font-medium text-brown-800 border border-brown-700 hover:bg-brown-700 hover:text-brown-600 rounded-full transition duration-200">

                        Register

                    </a>

                </div>

            </div>

        </div>

    </section>



---

    <section class="py-24 bg-brown-800">

        <div class="container mx-auto px-4">

            <h2 class="text-4xl font-semibold text-white text-center mb-12">Produk Unggulan Pilihan</h2>



            <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">

                

                <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl transition duration-300">

                    <a href="{{ route('product.show', ['slug' => 'kursi-rotan-alami']) }}" class="block">

                        <img 

                            src="https://via.placeholder.com/600x400?text=Kerajinan+Rotan" 

                            alt="Foto Produk 1: Kerajinan Rotan" 

                            class="w-full h-64 object-cover" 

                        >

                        <div class="py-4 px-4 text-center">

                            <h5 class="text-xl font-semibold text-brown-800 mb-1">Kursi Rotan Alami</h5>

                            <span class="block text-lg font-bold text-green-700">Rp. 450.000</span>

                        </div>

                    </a>

                </div>



                <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl transition duration-300">

                    <a href="{{ route('product.show', ['slug' => 'kain-batik-tulis']) }}" class="block">

                        <img 

                            src="https://via.placeholder.com/600x400?text=Kain+Batik" 

                            alt="Foto Produk 2: Kain Batik" 

                            class="w-full h-64 object-cover" 

                        >

                        <div class="py-4 px-4 text-center">

                            <h5 class="text-xl font-semibold text-brown-800 mb-1">Kain Batik Tulis</h5>

                            <span class="block text-lg font-bold text-green-700">Rp. 280.000</span>

                        </div>

                    </a>

                </div>



                <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl transition duration-300">

                    <a href="{{ route('product.show', ['slug' => 'patung-ukir-bali']) }}" class="block">

                        <img 

                            src="https://via.placeholder.com/600x400?text=Ukiran+Kayu" 

                            alt="Foto Produk 3: Ukiran Kayu" 

                            class="w-full h-64 object-cover" 

                        >

                        <div class="py-4 px-4 text-center">

                            <h5 class="text-xl font-semibold text-brown-800 mb-1">Patung Ukir Bali</h5>

                            <span class="block text-lg font-bold text-green-700">Rp. 850.000</span>

                        </div>

                    </a>

                </div>



            </div>

        </div>

    </section>

</div>

@endsection