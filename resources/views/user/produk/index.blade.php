@extends('layouts.app')

@section('content')

{{-- =========================
PRODUCT SECTION
========================= --}}
<section class="relative pt-32 pb-24 min-h-screen bg-gradient-to-b from-[#fff7ed] via-white to-gray-50 overflow-hidden">

    {{-- BACKGROUND ORNAMENT --}}
    <div class="absolute -top-32 -left-32 w-[400px] h-[400px] bg-orange-200/40 rounded-full blur-3xl"></div>

    <div class="absolute bottom-0 right-0 w-[350px] h-[350px] bg-yellow-100/50 rounded-full blur-3xl"></div>

    <div class="container mx-auto px-6 lg:px-12 relative z-10">

        {{-- =========================
        HEADER
        ========================= --}}
        <div class="text-center max-w-4xl mx-auto">

            {{-- BADGE --}}
            <div class="inline-flex items-center gap-3 bg-orange-100 text-orange-600 px-5 py-2 rounded-full font-semibold text-sm shadow-sm">

                🍽️ Katalog Produk Premium

            </div>

            {{-- TITLE --}}
            <h1 class="mt-8 text-5xl md:text-6xl font-black text-gray-900 leading-tight">

                Katalog Produk
                <span class="text-orange-500">
                    Pempek Ratu
                </span>

            </h1>

            {{-- DESCRIPTION --}}
            <p class="mt-6 text-lg md:text-xl text-gray-500 leading-relaxed">

                Nikmati berbagai pilihan pempek khas Palembang
                dengan cita rasa autentik, kualitas premium,
                dan bahan terbaik sejak tahun 2002.

            </p>

        </div>

        {{-- =========================
        SEARCH BAR
        ========================= --}}
        <div class="max-w-2xl mx-auto mt-14">

            <form method="GET"
                  action="/produk"
                  class="relative">

                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Cari produk favorit kamu..."
                       class="w-full bg-white border border-gray-200 rounded-3xl pl-16 pr-6 py-5 shadow-lg focus:outline-none focus:ring-4 focus:ring-orange-100 focus:border-orange-400 transition">

                {{-- ICON --}}
                <div class="absolute left-6 top-1/2 -translate-y-1/2 text-orange-400 text-xl">

                    🔍

                </div>

            </form>

        </div>

        {{-- =========================
        PRODUCT GRID
        ========================= --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 mt-20">

            @forelse($produks as $p)

            <div class="group bg-white rounded-[32px] overflow-hidden border border-gray-100 shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-3">

                {{-- IMAGE --}}
                <div class="relative overflow-hidden">

                    <img src="{{ asset('images/'.$p->gambar) }}"
                         alt="{{ $p->nama_produk }}"
                         class="w-full h-72 object-cover group-hover:scale-110 transition duration-700">

                    {{-- OVERLAY --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>

                    {{-- BADGE --}}
                    <div class="absolute top-5 left-5">

                        <span class="bg-orange-500 text-white text-xs px-4 py-2 rounded-full shadow-xl font-semibold">

                            Premium Product

                        </span>

                    </div>

                    {{-- PRICE FLOAT --}}
                    <div class="absolute bottom-5 right-5 bg-white/90 backdrop-blur-md px-4 py-2 rounded-2xl shadow-lg">

                        <h3 class="text-orange-500 font-black text-lg">

                            Rp {{ number_format($p->harga) }}

                        </h3>

                    </div>

                </div>

                {{-- CONTENT --}}
                <div class="p-7">

                    {{-- TITLE --}}
                    <h2 class="text-2xl font-black text-gray-800 line-clamp-1">

                        {{ $p->nama_produk }}

                    </h2>

                    {{-- DESCRIPTION --}}
                    <p class="mt-4 text-gray-500 leading-relaxed text-sm h-20 overflow-hidden">

                        {{ $p->deskripsi }}

                    </p>

                    {{-- STOCK BADGES --}}
                    <div class="mt-6 flex flex-wrap gap-3">

                        <span class="bg-green-100 text-green-700 text-xs px-4 py-2 rounded-full font-semibold">

                            Ready {{ $p->stok_ready }}

                        </span>

                        <span class="bg-blue-100 text-blue-700 text-xs px-4 py-2 rounded-full font-semibold">

                            Frozen {{ $p->stok_frozen }}

                        </span>

                        <span class="bg-orange-100 text-orange-700 text-xs px-4 py-2 rounded-full font-semibold">

                            PO H+3

                        </span>

                    </div>

                    {{-- BUTTON --}}
                    <form action="/cart/add"
                          method="POST"
                          class="mt-8">

                        @csrf

                        <input type="hidden"
                               name="produk_id"
                               value="{{ $p->id }}">

                        <button type="submit"
                                class="w-full bg-orange-500 hover:bg-orange-600 text-white py-4 rounded-2xl font-bold tracking-wide shadow-lg hover:shadow-orange-200 transition duration-300 hover:scale-[1.02]">

                            + Tambah ke Keranjang

                        </button>

                    </form>

                </div>

            </div>

            @empty

            {{-- EMPTY STATE --}}
            <div class="col-span-full">

                <div class="bg-white rounded-[40px] shadow-xl border border-gray-100 py-24 px-8 text-center max-w-3xl mx-auto">

                    <div class="text-8xl mb-6">
                        🍽️
                    </div>

                    <h2 class="text-4xl font-black text-gray-700">

                        Produk Belum Tersedia

                    </h2>

                    <p class="mt-5 text-lg text-gray-500 leading-relaxed">

                        Saat ini belum ada produk yang tersedia.
                        Silakan tambahkan produk melalui dashboard admin.

                    </p>

                    <a href="/"
                       class="inline-block mt-10 bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-2xl font-semibold shadow-lg transition duration-300">

                        Kembali ke Beranda

                    </a>

                </div>

            </div>

            @endforelse

        </div>

    </div>

</section>

@endsection