@extends('layouts.admin-template')

@section('title', 'Admin Dashboard')

@section('content')
<div class="max-w-full">

    {{-- Welcome Header --}}
    <div class="mb-8" data-aos="fade-down">
        <h1 class="text-4xl font-bold text-gray-800">Selamat Datang, Admin! 🛡️</h1>
        <p class="text-gray-600 mt-2 text-lg">Pantau dan kelola seluruh aktivitas platform</p>
    </div>

    {{-- Statistics Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">

        {{-- Total Users --}}
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition" data-aos="fade-up">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium uppercase tracking-wide">Total User</p>
                    <h3 class="text-4xl font-bold text-gray-800 mt-2">{{ $totalUsers }}</h3>
                    <p class="text-blue-600 text-sm mt-1 font-medium">Terdaftar</p>
                </div>
                <div class="bg-blue-100 p-4 rounded-xl">
                    <svg class="w-10 h-10 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Total Sellers --}}
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition" data-aos="fade-up" data-aos-delay="100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium uppercase tracking-wide">Total Seller</p>
                    <h3 class="text-4xl font-bold text-gray-800 mt-2">{{ $totalSellers }}</h3>
                    <p class="text-green-600 text-sm mt-1 font-medium">Aktif</p>
                </div>
                <div class="bg-green-100 p-4 rounded-xl">
                    <svg class="w-10 h-10 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Total Products --}}
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition" data-aos="fade-up" data-aos-delay="200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium uppercase tracking-wide">Total Produk</p>
                    <h3 class="text-4xl font-bold text-gray-800 mt-2">{{ $totalProducts }}</h3>
                    <p class="text-purple-600 text-sm mt-1 font-medium">Terpublish</p>
                </div>
                <div class="bg-purple-100 p-4 rounded-xl">
                    <svg class="w-10 h-10 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Total Revenue --}}
        <div class="bg-gradient-to-br from-orange-500 to-orange-600 p-6 rounded-xl shadow-lg text-white hover:shadow-xl transition" data-aos="fade-up" data-aos-delay="300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-orange-100 text-sm font-medium uppercase tracking-wide">Total Revenue</p>
                    <h3 class="text-3xl font-bold mt-2">Rp{{ number_format($totalRevenue, 0, ',', '.') }}</h3>
                    <p class="text-orange-100 text-sm mt-1 font-medium">💰 Keseluruhan</p>
                </div>
                <div class="bg-white bg-opacity-20 p-4 rounded-xl">
                    <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Recent Activity & Quick Actions --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-10">

        {{-- Quick Actions --}}
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6" data-aos="fade-right">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Quick Actions</h2>
                <div class="space-y-3">
                    <a href="{{ route('admin.sellers') }}" class="flex items-center space-x-3 p-3 rounded-lg bg-orange-50 hover:bg-orange-100 transition" style="background-color: var(--table-header);">
                        <svg class="w-6 h-6" style="color: var(--btn-approve);" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="font-medium text-gray-700">Konfirmasi Seller Baru</span>
                    </a>
                    <a href="{{ route('admin.users') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-100 transition">
                        <svg class="w-6 h-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        <span class="font-medium text-gray-700">Kelola User</span>
                    </a>
                    <a href="{{ route('admin.products') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-100 transition">
                        <svg class="w-6 h-6 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                        <span class="font-medium text-gray-700">Kelola Produk</span>
                    </a>
                </div>
            </div>
        </div>

        {{-- Recent Users --}}
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6" data-aos="fade-left">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-gray-800">User Terbaru</h2>
                    <a href="{{ route('admin.users') }}" class="text-blue-600 hover:text-blue-700 font-medium text-sm">Lihat Semua →</a>
                </div>
                <div class="space-y-3">
                    @forelse($recentUsers as $user)
                    <div class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 transition">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                                <span class="text-blue-600 font-bold">{{ substr($user->name, 0, 1) }}</span>
                            </div>
                            <div>
                                <p class="font-medium text-gray-800">{{ $user->name }}</p>
                                <p class="text-sm text-gray-500">{{ $user->email }}</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 rounded-full text-xs font-medium {{ $user->role == 'seller' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </div>
                    @empty
                    <p class="text-gray-500 text-center py-4">Belum ada user terbaru</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
