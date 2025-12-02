@extends('layouts.admin-template')

@section('title', 'Permintaan Hapus Akun')

@section('content')
<div class="max-w-full">

    {{-- Header --}}
    <div class="mb-8" data-aos="fade-down">
        <h1 class="text-3xl font-bold text-gray-800">Permintaan Hapus Akun Seller</h1>
        <p class="text-gray-600 mt-2">Review dan kelola permintaan penghapusan akun dari seller</p>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200" data-aos="fade-up">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Pending</p>
                    <h3 class="text-3xl font-bold text-yellow-600 mt-1">{{ $pendingCount }}</h3>
                </div>
                <div class="bg-yellow-100 p-3 rounded-lg">
                    <svg class="w-8 h-8 text-yellow-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200" data-aos="fade-up" data-aos-delay="100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Disetujui</p>
                    <h3 class="text-3xl font-bold text-green-600 mt-1">{{ $approvedCount }}</h3>
                </div>
                <div class="bg-green-100 p-3 rounded-lg">
                    <svg class="w-8 h-8 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200" data-aos="fade-up" data-aos-delay="200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Ditolak</p>
                    <h3 class="text-3xl font-bold text-red-600 mt-1">{{ $rejectedCount }}</h3>
                </div>
                <div class="bg-red-100 p-3 rounded-lg">
                    <svg class="w-8 h-8 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Requests Table --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden" data-aos="fade-up">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="border-b border-gray-200" style="background-color: var(--table-header);">
                    <tr>
                        <th class="text-left py-4 px-6 font-semibold text-gray-700">Seller</th>
                        <th class="text-left py-4 px-6 font-semibold text-gray-700">Alasan</th>
                        <th class="text-left py-4 px-6 font-semibold text-gray-700">Tanggal Ajukan</th>
                        <th class="text-left py-4 px-6 font-semibold text-gray-700">Status</th>
                        <th class="text-center py-4 px-6 font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($requests as $request)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-4 px-6">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center text-white font-bold">
                                    {{ substr($request->user->name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">{{ $request->user->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $request->user->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <p class="text-gray-700 line-clamp-2">{{ Str::limit($request->reason, 80) }}</p>
                        </td>
                        <td class="py-4 px-6 text-gray-700">
                            {{ $request->created_at->format('d M Y, H:i') }}
                        </td>
                        <td class="py-4 px-6">
                            @if($request->status == 'pending')
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-700">
                                ⏳ Pending
                            </span>
                            @elseif($request->status == 'approved')
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-700">
                                ✓ Disetujui
                            </span>
                            @else
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-red-100 text-red-700">
                                ✕ Ditolak
                            </span>
                            @endif
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex justify-center space-x-2">
                                @if($request->status == 'pending')
                                <button onclick="reviewRequest({{ $request->id }}, '{{ $request->user->name }}', '{{ addslashes($request->reason) }}')" class="px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition">
                                    Review
                                </button>
                                @else
                                <button onclick="viewDetail({{ $request->id }})" class="px-4 py-2 bg-gray-600 text-white text-sm font-semibold rounded-lg hover:bg-gray-700 transition">
                                    Detail
                                </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-12 text-gray-500">
                            <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                            <p class="text-lg font-semibold">Tidak ada permintaan</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modal Review Request --}}
<div id="reviewModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full p-8 transform transition-all max-h-screen overflow-y-auto" data-aos="zoom-in">
        <h3 class="text-2xl font-bold text-gray-800 mb-6">Review Permintaan Hapus Akun</h3>

        {{-- User Info --}}
        <div class="bg-gray-50 rounded-lg p-4 mb-6">
            <p class="text-sm text-gray-600 mb-1">Seller:</p>
            <p class="text-lg font-bold text-gray-800" id="reviewUserName"></p>
        </div>

        {{-- Reason --}}
        <div class="mb-6">
            <p class="text-sm text-gray-600 mb-2">Alasan Penghapusan:</p>
            <div class="bg-gray-50 rounded-lg p-4">
                <p class="text-gray-800" id="reviewReason"></p>
            </div>
        </div>

        {{-- Admin Note Form --}}
        <form id="reviewForm" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Catatan Admin (Opsional)
                </label>
                <textarea
                    name="admin_note"
                    rows="3"
                    placeholder="Berikan catatan untuk seller..."
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                ></textarea>
            </div>

            <div class="flex space-x-3">
                <button type="button" onclick="closeReviewModal()" class="flex-1 px-6 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-100 transition">
                    Batal
                </button>
                <button type="button" onclick="submitReview('rejected')" class="flex-1 px-6 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition">
                    Tolak
                </button>
                <button type="button" onclick="submitReview('approved')" class="flex-1 px-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition">
                    Setujui & Hapus
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    let currentRequestId = null;

    function reviewRequest(id, userName, reason) {
        currentRequestId = id;
        document.getElementById('reviewModal').classList.remove('hidden');
        document.getElementById('reviewUserName').textContent = userName;
        document.getElementById('reviewReason').textContent = reason;
        document.getElementById('reviewForm').action = `/admin/delete-requests/${id}/review`;
    }

    function closeReviewModal() {
        document.getElementById('reviewModal').classList.add('hidden');
    }

    function submitReview(status) {
        const form = document.getElementById('reviewForm');
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'status';
        input.value = status;
        form.appendChild(input);
        form.submit();
    }

    function viewDetail(id) {
        // Implement detail view logic
        alert(`View detail request ID: ${id}`);
    }
</script>
@endsection
