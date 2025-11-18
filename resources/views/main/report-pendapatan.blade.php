@extends('template.main-template')

@section('content')

    <h1 class="text-3xl font-semibold text-gray-900 mb-8">Laporan Pendapatan</h1>

    <div class="max-w-4xl p-6 bg-white rounded-lg shadow-md">

        <form method="GET" action="{{ route('report.generate') }}">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

                {{-- 1. Periode Waktu --}}
                <div>
                    <label for="periode" class="block text-sm font-medium text-gray-700 mb-2">Periode Waktu</label>
                    <select id="periode" name="periode" class="w-full p-3 border border-gray-400 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-600 appearance-none bg-white">
                        <option value="mingguan" selected>Mingguan</option>
                        <option value="harian">Harian</option>
                        <option value="bulanan">Bulanan</option>
                        <option value="tahunan">Tahunan</option>
                    </select>
                </div>

                {{-- 2. Pilih Tanggal (Date Picker Input) --}}
                <div>
                    <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-2">Pilih Tanggal</label>
                    <div class="relative">
                        <input type="date" id="tanggal" name="tanggal" value="{{ date('Y-m-d') }}"
                               class="w-full p-3 border border-gray-400 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-600 appearance-none pr-10">
                        <span class="absolute right-3 top-3 text-gray-500 pointer-events-none">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-4 18h4m-4 0V17m0 0H7m5 0h8m-4 4H7"/></svg>
                        </span>
                    </div>
                </div>

                {{-- 3. Kategori Produk --}}
                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">Kategori Produk</label>
                    <select id="kategori" name="kategori" class="w-full p-3 border border-gray-400 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-600 appearance-none bg-white">
                        <option value="semua" selected>Semua</option>
                        <option value="furniture">Furniture</option>
                        <option value="pakaian">Pakaian</option>
                        <option value="dekorasi">Dekorasi</option>
                        <option value="aksesoris">Aksesoris</option>
                    </select>
                </div>

            </div>

            <button type="submit"
                    class="px-8 py-3 text-white font-medium rounded-lg shadow-md hover:opacity-90 transition duration-150 text-lg"
                    style="background-color: #934c26;">
                Tampilkan Laporan
            </button>
        </form>

        <hr class="my-10">

        <h2 class="text-xl font-semibold text-gray-800 mb-4">Hasil Laporan</h2>

        <div class="bg-gray-100 p-4 rounded-lg mb-6">
            <p class="text-lg font-bold text-gray-700">Total Pendapatan : Rp 700.000</p>
        </div>

        <div class="overflow-x-auto shadow-sm border border-gray-200 rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-50">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-50">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-50">Jumlah Transaksi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-50">Total</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    {{-- Contoh data (looping) --}}
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2025-05-21</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Aksesoris</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp 150.000</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2025-05-21</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Furniture</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp 200.000</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2025-05-22</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Furniture</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp 250.000</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2025-05-23</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Furniture</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp 100.000</td>
                    </tr>
                    {{-- End Looping --}}
                </tbody>
            </table>
        </div>

    </div>

@endsection
