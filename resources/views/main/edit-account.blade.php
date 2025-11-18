@extends('template.main-template') {{-- Menggunakan layout Dashboard Pengguna --}}

@section('content')

    <h1 class="text-3xl font-semibold text-gray-900 mb-10">Edit Akun</h1>

    <form action="{{ route('user.account.update') }}" method="POST" class="max-w-4xl">
        @csrf
        @method('PUT') {{-- Gunakan method PUT untuk update --}}

        <h2 class="text-xl font-medium text-gray-700 mb-6 border-b pb-2">Informasi Personal</h2>

        <div class="space-y-6">

            {{-- Nama Depan (First Name) & Username --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                {{-- Input Nama Depan --}}
                <div>
                    <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                    <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $user->first_name ?? 'John') }}"
                           class="w-full p-3 border border-gray-400 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-600" required>
                </div>

                {{-- Input Username --}}
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                    <input type="text" id="username" name="username" value="{{ old('username', $user->username ?? 'SellerJohn') }}"
                           class="w-full p-3 border border-gray-400 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-600" required>
                </div>
            </div>

            {{-- Tanggal Lahir (Date of Birth) --}}
            <div>
                <label for="date_of_birth" class="block text-sm font-medium text-gray-700 mb-2">Date of birth</label>
                <div class="relative w-full md:w-1/2">
                    <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth ?? '1990-01-01') }}"
                           class="w-full p-3 border border-gray-400 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-600 appearance-none" required>
                    {{-- Ikon kalender (date input sudah memiliki ikon di beberapa browser, ini untuk estetika) --}}
                    <span class="absolute right-3 top-3 text-gray-500 pointer-events-none">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-4 18h4M8 17h8m-4 4V17m0 0H7m5 0h8m-4 4H7"/></svg>
                    </span>
                </div>
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email ?? 'john@example.com') }}"
                       class="w-full p-3 border border-gray-400 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-600" required>
            </div>

            {{-- Phone Number --}}
            <div>
                <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                <div class="flex w-full md:w-1/2">
                    <span class="inline-flex items-center px-3 border border-r-0 border-gray-400 bg-gray-50 text-gray-500 rounded-l-lg text-sm">
                        +62
                    </span>
                    <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $user->phone_number ?? '8123456789') }}"
                           class="flex-1 p-3 border border-gray-400 rounded-r-lg focus:outline-none focus:ring-1 focus:ring-gray-600" required>
                </div>
            </div>

            <hr class="pt-2">

            {{-- Password (dibuat terpisah untuk keamanan) --}}
            <div>
                <label for="new_password" class="block text-sm font-medium text-gray-700 mb-2">Password (Kosongkan jika tidak ingin diubah)</label>
                <input type="password" id="new_password" name="new_password" placeholder="Masukkan password baru"
                       class="w-full p-3 border border-gray-400 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-600">
            </div>

        </div>

        <div class="mt-12 flex items-center justify-between">
            <button type="submit"
                    class="px-10 py-3 text-white font-medium rounded-lg shadow-lg hover:opacity-90 transition duration-150 text-lg"
                    style="background-color: #934c26;">
                Simpan Perubahan
            </button>

            <div class="text-gray-500 italic text-sm flex items-center">
                <svg class="w-5 h-5 mr-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-11.44 9.17A7 7 0 0112 17a7 7 0 01-9.56-.83A2 2 0 012.55 15V7a2 2 0 012-2h15a2 2 0 012 2v8a2 2 0 01-1.45 1.84z" />
                </svg>
                Email konfirmasi perubahan akan dikirim.
            </div>
        </div>

    </form>

@endsection
