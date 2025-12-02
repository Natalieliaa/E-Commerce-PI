@extends('template.main-template')

@section('content')

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

@foreach ($products as $product)

    @include('components.product-card',
    ['id' => $product['id'],
    'gambar' => $product['gambar'],
    'nama_produk' => $product['nama_produk'],
    'harga' => $product['harga']
    ])

@endforeach

</div>

@endsection
