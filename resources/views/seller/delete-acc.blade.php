@extends('layouts.seller')

@section('title', 'Hapus Akun')

@section('content')
<div class="max-w-3xl mx-auto px-8 py-8">

    {{-- Header --}}
    <div class="mb-8" data-aos="fade-down">
        <h1 class="text-3xl font-bold text-red-600">Hapus Akun Seller</h1>
        <p class="text-gray-600 mt-2">Ajukan permintaan untuk menghapus akun Anda secara permanen</p>
    </div>

    {{-- Warning Card --}}
    <div class="bg-red-50 border-l-4 border-red-500 p-6 rounded-lg mb-8" data-aos="fade-up">
        <div class="flex items-start">
            <svg class="w-8 h-8 text-red-600 mr-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
            <div>
                <h3 class="text-lg font-bold text-red-800 mb-2">⚠️ Peringatan Penting!</h3>
                <p class="text-red-700 mb-3">Penghapusan akun bersifat <strong>PERMANEN</strong> dan akan mengakibatkan:</p>
                <ul class="list-disc list-inside space-y-2 text-red-700">
                    <li>Semua produk Anda akan dihapus dari platform</li>
                    <li>Riwayat transaksi dan pesanan akan terhapus</li>
                    <li>Data tidak dapat dikembalikan setelah disetujui admin</li>
                    <li>Anda tidak dapat login kembali dengan akun ini</li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Check if already requested --}}
    @if($existingRequest)
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-8 mb-8" data-aos="fade-up">
            <div class="text-center">
                @if($existingRequest->status == 'pending')
                <div class="w-20 h-20 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-12 h-12 text-yellow-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Permintaan Sedang Diproses</h3>
                <p class="text-gray-600 mb-4">Permintaan penghapusan akun Anda sedang menunggu persetujuan admin</p>

                <div class="bg-gray-50 rounded-lg p-4 text-left max-w-md mx-auto mb-6">
                    <p class="text-sm text-gray-600 mb-1"><strong>Alasan:</strong></p>
                    <p class="text-gray-800">{{ $existingRequest->reason }}</p>
                    <p class="text-sm text-gray-500 mt-3">Diajukan pada: {{ $existingRequest->created_at->format('d M Y, H:i') }}</p>
                </div>

                <form action="{{ route('seller.delete-account.cancel') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-6 py-3 bg-gray-600 text-white font-semibold rounded-lg hover:bg-gray-700 transition">
                        Batalkan Permintaan
                    </button>
                </form>

                @elseif($existingRequest->status == 'rejected')
                <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-12 h-12 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Permintaan Ditolak</h3>
                <p class="text-gray-600 mb-4">Admin telah menolak permintaan penghapusan akun Anda</p>

                @if($existingRequest->admin_note)
                <div class="bg-gray-50 rounded-lg p-4 text-left max-w-md mx-auto mb-6">
                    <p class="text-sm text-gray-600 mb-1"><strong>Catatan Admin:</strong></p>
                    <p class="text-gray-800">{{ $existingRequest->admin_note }}</p>
                </div>
                @endif

                <form action="{{ route('seller.delete-account.cancel') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition">
                        Ajukan Permintaan Baru
                    </button>
                </form>
                @endif
            </div>
        </div>
    @else
        {{-- Form Request Delete --}}
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-8" data-aos="fade-up">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Formulir Permintaan Penghapusan Akun</h2>

            <form action="{{ route('seller.delete-account.request') }}" method="POST">
                @csrf

                {{-- User Info --}}
                <div class="bg-gray-50 rounded-lg p-4 mb-6">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-600">Nama</p>
                            <p class="font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Email</p>
                            <p class="font-semibold text-gray-800">{{ Auth::user()->email }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Role</p>
                            <p class="font-semibold text-gray-800">Seller</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Bergabung</p>
                            <p class="font-semibold text-gray-800">{{ Auth::user()->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>

                {{-- Reason --}}
                <div class="mb-6">
                    <label for="reason" class="block text-sm font-semibold text-gray-700 mb-2">
                        Alasan Penghapusan Akun <span class="text-red-500">*</span>
                    </label>
                    <textarea
                        id="reason"
                        name="reason"
                        rows="5"
                        required
                        placeholder="Jelaskan alasan Anda ingin menghapus akun..."
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                    ></textarea>
                    @error('reason')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Confirmation Checkbox --}}
                <div class="mb-6">
                    <label class="flex items-start space-x-3 cursor-pointer">
                        <input type="checkbox" name="confirmation" required class="mt-1 w-5 h-5 text-red-600 border-gray-300 rounded focus:ring-red-500">
                        <span class="text-gray-700">
                            Saya memahami bahwa penghapusan akun bersifat permanen dan tidak dapat dibatalkan setelah disetujui admin.
                            Semua data terkait akun saya akan dihapus secara permanen.
                        </span>
                    </label>
                </div>

                {{-- Buttons --}}
                <div class="flex space-x-4">
                    <a href="{{ route('seller.dashboard') }}" class="flex-1 px-6 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-100 transition text-center">
                        Batal
                    </a>
                    <button type="submit" class="flex-1 px-6 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition">
                        Ajukan Permintaan
                    </button>
                </div>
            </form>
        </div>
    @endif

</div>
@endsection
