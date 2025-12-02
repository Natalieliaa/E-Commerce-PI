@extends('layouts.seller')

@section('title', 'Pesanan')

@section('content')
<div class="max-w-7xl mx-auto px-8 py-8">

    {{-- Header --}}
    <div class="mb-8" data-aos="fade-down">
        <h1 class="text-3xl font-bold text-gray-800">Pesanan Masuk</h1>
        <p class="text-gray-600 mt-2">Kelola semua pesanan dari customer</p>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200" data-aos="fade-up">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Pending</p>
                    <h3 class="text-3xl font-bold text-yellow-600 mt-1">{{ $orders->where('status', 'pending')->count() }}</h3>
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
                    <p class="text-gray-500 text-sm font-medium">Diproses</p>
                    <h3 class="text-3xl font-bold text-blue-600 mt-1">{{ $orders->where('status', 'processing')->count() }}</h3>
                </div>
                <div class="bg-blue-100 p-3 rounded-lg">
                    <svg class="w-8 h-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200" data-aos="fade-up" data-aos-delay="200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Dikirim</p>
                    <h3 class="text-3xl font-bold text-purple-600 mt-1">{{ $orders->where('status', 'shipped')->count() }}</h3>
                </div>
                <div class="bg-purple-100 p-3 rounded-lg">
                    <svg class="w-8 h-8 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200" data-aos="fade-up" data-aos-delay="300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Selesai</p>
                    <h3 class="text-3xl font-bold text-green-600 mt-1">{{ $orders->where('status', 'completed')->count() }}</h3>
                </div>
                <div class="bg-green-100 p-3 rounded-lg">
                    <svg class="w-8 h-8 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Orders List --}}
    <div class="space-y-6">
        @forelse($orders as $order)
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition" data-aos="fade-up">
            {{-- Order Header --}}
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-6">
                        <div>
                            <p class="text-xs text-gray-500 mb-1">Order Number</p>
                            <p class="font-bold text-gray-800 text-lg">{{ $order->order_number }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 mb-1">Customer</p>
                            <p class="font-semibold text-gray-800">{{ $order->user->name }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 mb-1">Tanggal</p>
                            <p class="font-semibold text-gray-800">{{ $order->created_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>

                    {{-- Status Badge --}}
                    <div>
                        @if($order->status == 'pending')
                        <span class="px-4 py-2 rounded-full text-sm font-bold bg-yellow-100 text-yellow-700">⏳ Pending</span>
                        @elseif($order->status == 'processing')
                        <span class="px-4 py-2 rounded-full text-sm font-bold bg-blue-100 text-blue-700">🔄 Diproses</span>
                        @elseif($order->status == 'shipped')
                        <span class="px-4 py-2 rounded-full text-sm font-bold bg-purple-100 text-purple-700">🚚 Dikirim</span>
                        @elseif($order->status == 'completed')
                        <span class="px-4 py-2 rounded-full text-sm font-bold bg-green-100 text-green-700">✓ Selesai</span>
                        @else
                        <span class="px-4 py-2 rounded-full text-sm font-bold bg-red-100 text-red-700">✕ Dibatalkan</span>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Order Items --}}
            <div class="p-6">
                <div class="space-y-4 mb-6">
                    @foreach($order->items as $item)
                    <div class="flex items-center space-x-4 pb-4 border-b border-gray-100 last:border-0">
                        <img src="{{ $item->product->gambar ? asset('storage/'.$item->product->gambar) : 'https://via.placeholder.com/80' }}"
                             alt="{{ $item->product->nama_produk }}"
                             class="w-20 h-20 object-cover rounded-lg">
                        <div class="flex-1">
                            <h4 class="font-semibold text-gray-800 mb-1">{{ $item->product->nama_produk }}</h4>
                            <p class="text-sm text-gray-600">Qty: {{ $item->quantity }} × Rp{{ number_format($item->price, 0, ',', '.') }}</p>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-green-600 text-lg">Rp{{ number_format($item->subtotal, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Shipping Info --}}
                <div class="bg-gray-50 rounded-lg p-4 mb-6">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-xs text-gray-500 mb-1">Alamat Pengiriman</p>
                            <p class="text-sm font-medium text-gray-800">{{ $order->shipping_address }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 mb-1">No. Telepon</p>
                            <p class="text-sm font-medium text-gray-800">{{ $order->phone }}</p>
                        </div>
                    </div>
                    @if($order->notes)
                    <div class="mt-3 pt-3 border-t border-gray-200">
                        <p class="text-xs text-gray-500 mb-1">Catatan</p>
                        <p class="text-sm text-gray-700">{{ $order->notes }}</p>
                    </div>
                    @endif
                </div>

                {{-- Total & Actions --}}
                <div class="flex justify-between items-center pt-4 border-t border-gray-200">
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Total Pesanan ({{ $order->items->sum('quantity') }} item)</p>
                        <p class="text-2xl font-bold text-gray-800">Rp{{ number_format($order->items->sum('subtotal'), 0, ',', '.') }}</p>
                    </div>

                    {{-- Action Buttons --}}
                    @if($order->status == 'pending')
                    <div class="flex space-x-3">
                        <form action="{{ route('seller.orders.update-status', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="processing">
                            <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                                Proses Pesanan
                            </button>
                        </form>
                        <form action="{{ route('seller.orders.update-status', $order->id) }}" method="POST" onsubmit="return confirm('Yakin batalkan pesanan ini?')">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="cancelled">
                            <button type="submit" class="px-6 py-3 border-2 border-red-600 text-red-600 font-semibold rounded-lg hover:bg-red-50 transition">
                                Batalkan
                            </button>
                        </form>
                    </div>
                    @elseif($order->status == 'processing')
                    <form action="{{ route('seller.orders.update-status', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="shipped">
                        <button type="submit" class="px-6 py-3 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition">
                            Tandai Dikirim
                        </button>
                    </form>
                    @elseif($order->status == 'shipped')
                    <form action="{{ route('seller.orders.update-status', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="completed">
                        <button type="submit" class="px-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition">
                            Tandai Selesai
                        </button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-16 text-center" data-aos="fade-up">
            <svg class="w-24 h-24 mx-auto mb-4 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
            </svg>
            <p class="text-xl font-semibold text-gray-400 mb-2">Belum ada pesanan</p>
            <p class="text-gray-500">Pesanan dari customer akan muncul di sini</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
