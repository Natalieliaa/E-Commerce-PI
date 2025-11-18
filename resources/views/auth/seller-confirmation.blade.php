@extends('layouts.admin-dashboard') {{-- Pastikan path ini benar --}}

@section('content')

    <div class="text-sm text-gray-500 mb-6">
        Admin / Konfirmasi Pendaftaran Seller
    </div>

    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Pendaftaran Seller</h2>

    <div class="shadow-md rounded-lg overflow-hidden mb-8">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider" style="background-color: var(--table-header);">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider" style="background-color: var(--table-header);">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider" style="background-color: var(--table-header);">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider" style="background-color: var(--table-header);">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                {{-- Contoh Data --}}
                <tr class="bg-white">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Zeela</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 underline">zeelaa@gmail.com</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">25 Mei 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-yellow-600 font-semibold">Pending</td>
                </tr>
                {{-- Anda bisa mengulang loop di sini: @foreach ($pendingSellers as $seller) --}}
            </tbody>
        </table>
    </div>

    <hr class="my-8">

    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Detail New Seller</h2>

    <div class="p-8 bg-white shadow-lg rounded-lg border border-gray-100">
        <h3 class="text-xl font-bold mb-4 text-gray-900">zeela</h3>

        <div class="space-y-2 text-lg">
            <p><span class="font-bold italic">Nama : </span> zeela</p>
            <p><span class="font-bold italic">Email : </span> <span class="underline">zeelaa@gmail.com</span></p>
            <p><span class="font-bold italic">Nama Toko : </span> Toko Kerajinan kayu zella</p>
        </div>

        <div class="flex items-center mt-8 space-x-4">
            {{-- Tombol Setujui --}}
            <button class="px-6 py-2 text-white font-medium rounded-md shadow-md hover:opacity-90 transition duration-150"
                    style="background-color: var(--btn-approve);">
                Setujui
            </button>

            {{-- Tombol Tolak --}}
            <button class="px-6 py-2 text-gray-800 font-medium rounded-md shadow-md border border-gray-400 hover:bg-gray-100 transition duration-150"
                    style="background-color: var(--btn-reject);">
                Tolak
            </button>

            {{-- Status Konfirmasi Email --}}
            <p class="ml-4 text-gray-500 italic text-sm">
                Email konfirmasi telah dikirim kepada Seller
            </p>
        </div>
    </div>

@endsection
