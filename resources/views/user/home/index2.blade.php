@extends('layouts.app')

@section('content')

{{-- =========================
HERO SECTION
========================= --}}
<section class="relative overflow-hidden bg-[#0f0f0f] min-h-screen flex items-center">

    {{-- BACKGROUND --}}
    <div class="absolute inset-0">

        <img src="{{ asset('images/hero-pempek.jpg') }}"
             class="w-full h-full object-cover scale-105">

        <div class="absolute inset-0 bg-black/75"></div>

        <div class="absolute inset-0 bg-gradient-to-r from-black via-black/70 to-orange-900/30"></div>

    </div>

    {{-- GLOW --}}
    <div class="absolute -top-32 -left-32 w-[450px] h-[450px] bg-orange-500/20 blur-3xl rounded-full"></div>

    <div class="absolute -bottom-32 -right-32 w-[450px] h-[450px] bg-yellow-400/10 blur-3xl rounded-full"></div>

    {{-- CONTENT --}}
    <div class="relative container mx-auto px-6 lg:px-14 pt-32 pb-20">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            {{-- LEFT --}}
            <div class="text-white">

                {{-- BADGE --}}
                <div class="inline-flex items-center gap-3 px-5 py-3 rounded-full bg-white/10 border border-white/10 backdrop-blur-xl">

                    <span class="w-2.5 h-2.5 bg-orange-400 rounded-full animate-pulse"></span>

                    <span class="text-sm tracking-wide text-orange-200 font-medium">
                        UMKM Pempek Ratu • Sejak 2002
                    </span>

                </div>

                {{-- TITLE --}}
                <h1 class="mt-8 text-5xl md:text-6xl xl:text-7xl font-black leading-tight">

                    Pempek
                    <span class="text-orange-400">
                        Premium
                    </span>

                    <br>

                    Khas Palembang

                </h1>

                {{-- DESC --}}
                <p class="mt-8 text-lg text-gray-300 leading-relaxed max-w-2xl">

                    Nikmati cita rasa autentik pempek khas Palembang
                    dengan kualitas premium, bahan terbaik,
                    dan pelayanan modern berbasis digital.

                </p>

                {{-- BUTTON --}}
                <div class="mt-10 flex flex-wrap gap-5">

                    <a href="/produk"
                       class="group inline-flex items-center gap-3 bg-orange-500 hover:bg-orange-600 px-8 py-4 rounded-2xl font-semibold shadow-2xl hover:scale-105 transition duration-300">

                        🍽️ Pesan Sekarang

                        <span class="group-hover:translate-x-1 transition">
                            →
                        </span>

                    </a>

                    <a href="https://wa.me/628123456789"
                       class="inline-flex items-center gap-3 bg-white/10 hover:bg-white/20 border border-white/10 px-8 py-4 rounded-2xl font-semibold backdrop-blur-xl transition">

                        📲 Hubungi Kami

                    </a>

                </div>

                {{-- STATS --}}
                <div class="grid grid-cols-3 gap-6 mt-14">

                    <div class="bg-white/5 border border-white/10 rounded-3xl p-5 backdrop-blur-md">

                        <h3 class="text-3xl font-black text-orange-400">
                            20+
                        </h3>

                        <p class="text-gray-300 text-sm mt-2">
                            Tahun Pengalaman
                        </p>

                    </div>

                    <div class="bg-white/5 border border-white/10 rounded-3xl p-5 backdrop-blur-md">

                        <h3 class="text-3xl font-black text-orange-400">
                            1000+
                        </h3>

                        <p class="text-gray-300 text-sm mt-2">
                            Pelanggan Setia
                        </p>

                    </div>

                    <div class="bg-white/5 border border-white/10 rounded-3xl p-5 backdrop-blur-md">

                        <h3 class="text-3xl font-black text-orange-400">
                            Fresh
                        </h3>

                        <p class="text-gray-300 text-sm mt-2">
                            Dibuat Harian
                        </p>

                    </div>

                </div>

            </div>

            {{-- RIGHT --}}
            <div class="hidden lg:flex justify-center relative">

                <div class="relative w-[520px]">

                    {{-- GLOW --}}
                    <div class="absolute inset-0 bg-orange-500/20 blur-3xl rounded-full"></div>

                    {{-- CARD --}}
                    <div class="relative rounded-[40px] overflow-hidden border border-white/10 bg-white/10 backdrop-blur-xl shadow-[0_25px_80px_rgba(0,0,0,.45)]">

                        <img src="{{ asset('images/hero-pempek.jpg') }}"
                             class="w-full h-[650px] object-cover">

                        {{-- INFO --}}
                        <div class="absolute bottom-0 left-0 right-0 p-7 bg-gradient-to-t from-black/90 to-transparent text-white">

                            <div class="flex items-center justify-between">

                                <div>

                                    <h3 class="text-3xl font-bold">
                                        Pempek Ratu
                                    </h3>

                                    <p class="text-gray-300 mt-1">
                                        Authentic Palembang Taste
                                    </p>

                                </div>

                                <div class="bg-orange-500 px-5 py-3 rounded-2xl font-bold shadow-xl">

                                    ⭐ 4.9

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- =========================
PRODUK SECTION
========================= --}}
<section class="py-24 bg-gradient-to-b from-gray-50 to-white">

    <div class="container mx-auto px-6 lg:px-14">

        {{-- TITLE --}}
        <div class="text-center max-w-3xl mx-auto">

            <span class="text-orange-500 uppercase tracking-[4px] font-semibold">
                Produk Favorit
            </span>

            <h2 class="mt-5 text-4xl md:text-5xl font-black text-gray-800 leading-tight">

                Menu Best Seller
                Pempek Ratu

            </h2>

            <p class="mt-6 text-lg text-gray-500 leading-relaxed">

                Pilihan menu pempek khas Palembang
                dengan kualitas premium dan rasa autentik.

            </p>

        </div>

        {{-- GRID --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-8 mt-16">

            @foreach($produks as $p)

            <div class="group bg-white rounded-[32px] overflow-hidden border border-gray-100 shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-3">

                {{-- IMAGE --}}
                <div class="relative overflow-hidden">

                    <img src="{{ asset('images/'.$p->gambar) }}"
                         class="w-full h-64 object-cover group-hover:scale-110 transition duration-700">

                    {{-- BADGE --}}
                    <div class="absolute top-4 left-4 bg-orange-500 text-white text-xs px-4 py-2 rounded-full shadow-lg font-semibold">

                        Best Seller

                    </div>

                </div>

                {{-- CONTENT --}}
                <div class="p-6">

                    <h3 class="text-2xl font-bold text-gray-800 line-clamp-1">
                        {{ $p->nama_produk }}
                    </h3>

                    <p class="text-gray-500 text-sm mt-3 leading-relaxed h-12 overflow-hidden">

                        Pempek khas Palembang dengan cita rasa autentik dan kualitas premium.

                    </p>

                    {{-- PRICE --}}
                    <div class="mt-5">

                        <span class="text-orange-500 text-3xl font-black">
                            Rp {{ number_format($p->harga) }}
                        </span>

                    </div>

                    {{-- BADGES --}}
                    <div class="flex flex-wrap gap-2 mt-5">

                        <span class="bg-green-100 text-green-600 text-xs px-3 py-1 rounded-full font-medium">
                            Ready
                        </span>

                        <span class="bg-blue-100 text-blue-600 text-xs px-3 py-1 rounded-full font-medium">
                            Frozen
                        </span>

                        <span class="bg-orange-100 text-orange-600 text-xs px-3 py-1 rounded-full font-medium">
                            PO H+3
                        </span>

                    </div>

                    {{-- BUTTON --}}
                    <form action="/cart/add"
                          method="POST"
                          class="mt-6">

                        @csrf

                        <input type="hidden"
                               name="produk_id"
                               value="{{ $p->id }}">

                        <button type="submit"
                                class="w-full bg-orange-500 hover:bg-orange-600 text-white py-4 rounded-2xl font-semibold transition duration-300 shadow-lg hover:shadow-orange-200">

                            Tambah ke Keranjang

                        </button>

                    </form>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>

{{-- =========================
ABOUT SECTION
========================= --}}
<section class="py-24 bg-white overflow-hidden">

    <div class="container mx-auto px-6 lg:px-14">

        <div class="grid lg:grid-cols-2 gap-20 items-center">

            {{-- IMAGE --}}
            <div class="relative">

                <div class="absolute -top-10 -left-10 w-44 h-44 bg-orange-100 rounded-full blur-3xl"></div>

                <img src="{{ asset('images/about-pempek.jpg') }}"
                     class="relative rounded-[40px] shadow-2xl w-full object-cover">

            </div>

            {{-- TEXT --}}
            <div>

                <span class="text-orange-500 uppercase tracking-[4px] font-semibold">
                    Tentang UMKM
                </span>

                <h2 class="mt-5 text-4xl md:text-5xl font-black leading-tight text-gray-800">

                    Cita Rasa Tradisional
                    Dengan Sentuhan Modern

                </h2>

                <p class="mt-8 text-gray-600 text-lg leading-relaxed">

                    UMKM Pempek Ratu merupakan usaha kuliner khas
                    Palembang yang telah berdiri sejak tahun 2002.
                    Kini hadir dengan sistem digital modern untuk
                    mempermudah pemesanan, manajemen inventori,
                    dan pelayanan pelanggan.

                </p>

                {{-- FEATURES --}}
                <div class="mt-10 space-y-5">

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-500 flex items-center justify-center font-bold text-lg">
                            ✓
                        </div>

                        <span class="text-gray-700 font-medium">
                            Sistem Pemesanan Online Modern
                        </span>

                    </div>

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-500 flex items-center justify-center font-bold text-lg">
                            ✓
                        </div>

                        <span class="text-gray-700 font-medium">
                            Manajemen Inventori Otomatis
                        </span>

                    </div>

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-500 flex items-center justify-center font-bold text-lg">
                            ✓
                        </div>

                        <span class="text-gray-700 font-medium">
                            Sistem Pre-Order H+3
                        </span>

                    </div>

                </div>

                {{-- BUTTON --}}
                <a href="/about"
                   class="inline-flex items-center gap-3 mt-10 bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-2xl font-semibold shadow-xl hover:scale-105 transition duration-300">

                    Tentang Kami →

                </a>

            </div>

        </div>

    </div>

</section>

@endsection