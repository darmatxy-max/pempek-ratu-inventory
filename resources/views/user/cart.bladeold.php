@extends('layouts.app')

@section('content')

<section class="pt-32 pb-20 min-h-screen bg-gray-100">

<div class="container mx-auto px-6">

<h1 class="text-4xl font-bold mb-10">
Keranjang Belanja
</h1>

<div class="bg-white rounded-3xl shadow-xl p-8">

@if(session('cart'))

@php $total = 0; @endphp

@foreach(session('cart') as $id => $item)

@php
$total += $item['harga'] * $item['qty'];
@endphp

<div class="flex items-center justify-between border-b py-5">

<div class="flex items-center gap-5">

<img src="/images/{{ $item['gambar'] }}"
class="w-24 h-24 object-cover rounded-xl">

<div>

<h2 class="font-bold text-xl">
{{ $item['nama_produk'] }}
</h2>

<p class="text-orange-500">
Rp {{ number_format($item['harga']) }}
</p>

<p>
Qty: {{ $item['qty'] }}
</p>

</div>

</div>

<div class="font-bold text-lg">
Rp {{ number_format($item['harga'] * $item['qty']) }}
</div>

</div>

@endforeach

<div class="mt-8 text-right">

<h2 class="text-3xl font-bold">
Total:
Rp {{ number_format($total) }}
</h2>

<a href="/checkout"
class="inline-block mt-5 bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-xl">

Checkout

</a>

</div>

@else

<p>Keranjang masih kosong.</p>

@endif

</div>

</div>

</section>

@endsection