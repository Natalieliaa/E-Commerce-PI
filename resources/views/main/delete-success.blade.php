@extends('template.main-template') {{-- Menggunakan layout publik/utama tanpa sidebar --}}

@section('content')

<div class="flex flex-col items-center justify-center min-h-screen bg-gray-50 p-6">

    <div class="max-w-xl w-full text-center bg-white p-10 rounded-xl shadow-lg">

        <div class="mb-8">
            <svg class="w-24 h-24 mx-auto text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>

        <h1 class="text-4xl font-bold mb-4" style="color: #222;">
            Akun Berhasil Dihapus
        </h1>
        <p class="text-xl text-gray-700 mb-10">
            Akun Anda telah berhasil dihapus. Kami mohon maaf atas ketidaknyamanan yang mungkin Anda alami.
        </p>

        <a href="{{ url('/') }}"
           class="inline-block px-10 py-3 text-white font-medium rounded-lg shadow-md hover:opacity-90 transition duration-150 text-lg"
           style="background-color: #934c26;">
            Kembali ke Beranda
        </a>

        {{-- Pesan ini tidak logis muncul di halaman sukses hapus akun --}}
        {{-- <div class="mt-8 text-center">
            <p class="text-gray-500 italic text-sm flex items-center justify-center">
                <svg class="w-5 h-5 mr-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">...</svg>
                Email konfirmasi telah dikirim kepada Seller
            </p>
        </div> --}}

    </div>
</div>

@endsection
