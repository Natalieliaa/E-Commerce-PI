@extends('template.seller-template')

@section('title', 'Dashboard Seller')

@section('content')

@include('components.seller-navbar')

<div class="max-w-5xl mx-auto bg-white shadow rounded-xl p-6">

        <!-- TITLE + PERIOD SELECTOR -->
        <div class="flex justify-between items-center mb-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Income Overview</h1>
                <p class="text-gray-500">Monthly income statistics</p>
            </div>

            <div class="flex gap-2">
                <button class="px-4 py-2 rounded-lg border text-gray-600 hover:bg-gray-100">Today</button>
                <button class="px-4 py-2 rounded-lg border text-gray-600 hover:bg-gray-100">Weekly</button>
                <button class="px-4 py-2 rounded-lg border bg-blue-600 text-white">Monthly</button>
            </div>
        </div>

        <!-- CHART -->
        <div class="w-full mt-4">
            <canvas id="incomeChart" height="120"></canvas>
        </div>
    </div>

    <!-- Chart Script -->
    <script>
        const ctx = document.getElementById('incomeChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    'Jan', 'Feb', 'Mar', 'Apr', 'May',
                    'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                ],
                datasets: [
                    {
                        label: 'Income',
                        data: [4200, 4800, 4500, 5200, 5800, 6300, 6900, 7200, 6800, 7500, 8200, 8700],
                        fill: true,
                        borderColor: '#1d4ed8',
                        backgroundColor: 'rgba(29, 78, 216, 0.15)',
                        tension: 0.4,
                        borderWidth: 3,
                    }
                ]
            },
            options: {
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        ticks: { callback: value => '$' + value }
                    }
                }
            }
        });
    </script>
    public function index()
{
    $sellerId = Auth::id();

    $products = Product::where('seller_id', $sellerId)->latest()->get();

    $totalProducts = $products->count();
    $totalStok = $products->sum('stok');

    // Total pesanan
    $totalOrders = Order::whereHas('items.product', function($q) use ($sellerId) {
        $q->where('seller_id', $sellerId);
    })->count();

    // Total pendapatan
    $totalRevenue = Order::whereHas('items.product', function($q) use ($sellerId) {
        $q->where('seller_id', $sellerId);
    })->where('status', 'completed')->sum('total');

    return view('seller.dashboard', compact(
        'products',
        'totalProducts',
        'totalStok',
        'totalOrders',
        'totalRevenue'
    ));
}
@endsection
