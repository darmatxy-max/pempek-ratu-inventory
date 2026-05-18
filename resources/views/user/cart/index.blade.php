@extends('layouts.app')

@section('content')

<section class="bg-gray-100 min-h-screen py-16">

    <div class="container mx-auto px-6">

        <!-- TITLE -->
        <div class="mb-10">

            <h1 class="text-4xl font-extrabold text-gray-800">
                Keranjang Belanja
            </h1>

            <p class="text-gray-500 mt-2">
                Daftar pesanan produk UMKM Pempek Ratu
            </p>

        </div>

        {{-- NOTIFIKASI --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if(session('cart') && count(session('cart')) > 0)

        @php
            $total = 0;
        @endphp

        <div class="grid lg:grid-cols-3 gap-8">

            <!-- LEFT -->
            <div class="lg:col-span-2 space-y-6">

                @foreach(session('cart') as $id => $item)

                @php
                    $qty = $item['qty'] ?? 1;
                    $subtotal = $item['harga'] * $qty;
                    $total += $subtotal;
                @endphp

                <div class="bg-white rounded-3xl shadow-lg p-5">

                    <div class="flex gap-5">

                        <!-- IMAGE -->
                        <img src="{{ asset('images/'.$item['gambar']) }}"
                             class="w-32 h-32 object-cover rounded-2xl">

                        <!-- INFO -->
                        <div class="flex-1">

                            <h2 class="text-2xl font-bold text-gray-800">
                                {{ $item['nama_produk'] }}
                            </h2>

                            <p class="text-orange-500 font-bold text-xl mt-2">
                                Rp {{ number_format($item['harga']) }}
                            </p>

                            <!-- UPDATE QTY -->
                            <form action="/cart/update/{{ $id }}"
                                  method="POST"
                                  class="mt-5 flex items-center gap-3">

                                @csrf

                                <input type="number"
                                       name="qty"
                                       value="{{ $qty }}"
                                       min="1"
                                       class="w-24 border rounded-xl px-4 py-2">

                                <button class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2 rounded-xl">

                                    Update

                                </button>

                            </form>

                            <!-- HAPUS -->
                            <form action="/cart/remove/{{ $id }}"
                                  method="POST"
                                  class="mt-3">

                                @csrf

                                <button class="text-red-500 hover:text-red-700">

                                    Hapus Produk

                                </button>

                            </form>

                        </div>

                        <!-- SUBTOTAL -->
                        <div class="text-right">

                            <p class="text-gray-500 text-sm">
                                Subtotal
                            </p>

                            <h3 class="text-2xl font-extrabold text-gray-800">
                                Rp {{ number_format($subtotal) }}
                            </h3>

                        </div>

                    </div>

                </div>

                @endforeach

            </div>

            <!-- RIGHT -->
            <div>

                <div class="bg-orange-500 rounded-3xl p-8 text-white shadow-2xl sticky top-24">

                    <h2 class="text-3xl font-extrabold">
                        Ringkasan
                    </h2>

                    <div class="mt-8 flex justify-between text-lg">

                        <span>Total</span>

                        <span class="font-bold">
                            Rp {{ number_format($total) }}
                        </span>

                    </div>

                    <a href="/checkout"
                       class="block text-center mt-8 bg-white text-orange-500 hover:bg-gray-100 py-4 rounded-2xl font-bold">

                        Checkout Sekarang

                    </a>

                    <a href="/produk"
                       class="block text-center mt-4 border border-white py-4 rounded-2xl hover:bg-white/10">

                        Lanjut Belanja

                    </a>

                </div>

            </div>

        </div>

        @else

        <!-- EMPTY -->
        <div class="bg-white rounded-3xl shadow-xl p-16 text-center">

            <div class="text-7xl">
                🛒
            </div>

            <h2 class="mt-6 text-3xl font-bold text-gray-800">
                Keranjang Masih Kosong
            </h2>

            <p class="mt-3 text-gray-500">
                Yuk pesan pempek favorit Anda sekarang juga.
            </p>

            <a href="/produk"
               class="inline-block mt-8 bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-2xl">

                Lihat Produk

            </a>

        </div>

        @endif

    </div>

</section>

@endsection