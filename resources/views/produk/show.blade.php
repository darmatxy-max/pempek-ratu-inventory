@extends('layouts.app')

@section('content')

<section class="py-20">

<div class="container mx-auto px-6">

<div class="grid md:grid-cols-2 gap-14">

<div>
<img src="{{ asset('images/'.$produk->gambar) }}"
class="w-full rounded-3xl shadow-2xl">
</div>

<div>

<h1 class="text-5xl font-black">
{{ $produk->nama_produk }}
</h1>

<p class="text-orange-500 text-4xl font-bold mt-6">
Rp {{ number_format($produk->harga) }}
</p>

<p class="mt-6 text-gray-600 leading-relaxed">
Pempek khas Palembang dengan kualitas premium
dan cita rasa autentik.
</p>

<div class="mt-8 flex gap-3">

<span class="bg-green-100 text-green-600 px-4 py-2 rounded-full">
Ready
</span>

<span class="bg-blue-100 text-blue-600 px-4 py-2 rounded-full">
Frozen
</span>

<span class="bg-orange-100 text-orange-600 px-4 py-2 rounded-full">
PO H+3
</span>

</div>

<form action="/cart/add" method="POST" class="mt-10">

@csrf

<input type="hidden" name="produk_id" value="{{ $produk->id }}">

<button class="bg-orange-500 hover:bg-orange-600 text-white px-10 py-4 rounded-2xl font-semibold">

Tambah Keranjang

</button>

</form>

</div>

</div>

</div>

</section>

@endsection