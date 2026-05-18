@extends('layouts.app')

@section('content')

{{-- =========================
HERO ABOUT
========================= --}}
<section class="relative overflow-hidden bg-[#0f0f0f] pt-36 pb-24">

    {{-- BACKGROUND --}}
    <div class="absolute inset-0">

        <img src="{{ asset('images/about-pempek.jpg') }}"
             class="w-full h-full object-cover opacity-20">

        <div class="absolute inset-0 bg-black/80"></div>

        <div class="absolute inset-0 bg-gradient-to-r from-black via-black/80 to-orange-900/30"></div>

    </div>

    {{-- GLOW --}}
    <div class="absolute -top-40 -left-40 w-[500px] h-[500px] bg-orange-500/20 rounded-full blur-3xl"></div>

    <div class="absolute -bottom-40 -right-40 w-[500px] h-[500px] bg-yellow-500/10 rounded-full blur-3xl"></div>

    {{-- CONTENT --}}
    <div class="relative container mx-auto px-6 lg:px-14">

        <div class="max-w-4xl">

            {{-- BADGE --}}
            <div class="inline-flex items-center gap-3 bg-white/10 border border-white/10 backdrop-blur-xl px-5 py-3 rounded-full">

                <span class="w-2.5 h-2.5 bg-orange-400 rounded-full animate-pulse"></span>

                <span class="text-orange-200 text-sm tracking-wide font-medium">
                    Tentang UMKM Pempek Ratu
                </span>

            </div>

            {{-- TITLE --}}
            <h1 class="mt-8 text-5xl md:text-7xl font-black leading-tight text-white">

                Cita Rasa
                <span class="text-orange-400">
                    Tradisional
                </span>

                <br>

                Dengan Pelayanan Modern

            </h1>

            {{-- DESC --}}
            <p class="mt-8 text-lg md:text-xl text-gray-300 leading-relaxed max-w-3xl">

                UMKM Pempek Ratu menghadirkan pempek khas Palembang
                berkualitas premium sejak tahun 2002 dengan perpaduan
                resep autentik, bahan pilihan, dan sistem pelayanan modern.

            </p>

        </div>

    </div>

</section>

{{-- =========================
ABOUT CONTENT
========================= --}}
<section class="relative py-24 bg-gradient-to-b from-gray-50 to-white overflow-hidden">

    {{-- ORNAMENT --}}
    <div class="absolute top-0 left-0 w-72 h-72 bg-orange-100 rounded-full blur-3xl opacity-50"></div>

    <div class="absolute bottom-0 right-0 w-72 h-72 bg-yellow-100 rounded-full blur-3xl opacity-50"></div>

    <div class="container mx-auto px-6 lg:px-14 relative z-10">

        <div class="grid lg:grid-cols-2 gap-20 items-center">

            {{-- IMAGE --}}
            <div class="relative">

                <div class="absolute -top-8 -left-8 w-40 h-40 bg-orange-200 rounded-full blur-3xl opacity-50"></div>

                <img src="{{ asset('images/about-pempek.jpg') }}"
                     class="relative rounded-[40px] shadow-2xl w-full object-cover">

                {{-- FLOATING CARD --}}
                <div class="absolute -bottom-8 -right-8 bg-white rounded-3xl shadow-2xl p-6 border border-gray-100">

                    <h3 class="text-4xl font-black text-orange-500">
                        20+
                    </h3>

                    <p class="text-gray-600 mt-2 font-medium">
                        Tahun Pengalaman
                    </p>

                </div>

            </div>

            {{-- TEXT --}}
            <div>

                <span class="text-orange-500 uppercase tracking-[4px] font-semibold">
                    Sejarah Kami
                </span>

                <h2 class="mt-5 text-4xl md:text-5xl font-black leading-tight text-gray-800">

                    Pempek Ratu,
                    Kebanggaan Kuliner
                    Khas Palembang

                </h2>

                <p class="mt-8 text-lg text-gray-600 leading-relaxed">

                    UMKM Pempek Ratu merupakan usaha kuliner khas
                    Palembang yang berdiri sejak tahun 2002 dan
                    dikelola langsung oleh Ibu Ratu Endang Sari
                    bersama keluarga.

                </p>

                <p class="mt-5 text-lg text-gray-600 leading-relaxed">

                    Dengan menjaga kualitas rasa autentik dan bahan
                    premium, Pempek Ratu terus berkembang menjadi
                    usaha kuliner terpercaya yang melayani pelanggan
                    dari berbagai daerah.

                </p>

                {{-- FEATURES --}}
                <div class="mt-10 space-y-5">

                    <div class="flex items-start gap-4">

                        <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-500 flex items-center justify-center text-xl font-bold shrink-0">
                            ✓
                        </div>

                        <div>

                            <h3 class="font-bold text-gray-800 text-lg">
                                Bahan Berkualitas Premium
                            </h3>

                            <p class="text-gray-500 mt-1">
                                Menggunakan ikan segar dan bahan pilihan terbaik.
                            </p>

                        </div>

                    </div>

                    <div class="flex items-start gap-4">

                        <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-500 flex items-center justify-center text-xl font-bold shrink-0">
                            ✓
                        </div>

                        <div>

                            <h3 class="font-bold text-gray-800 text-lg">
                                Sistem Pelayanan Modern
                            </h3>

                            <p class="text-gray-500 mt-1">
                                Mendukung pemesanan online dan manajemen digital.
                            </p>

                        </div>

                    </div>

                    <div class="flex items-start gap-4">

                        <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-500 flex items-center justify-center text-xl font-bold shrink-0">
                            ✓
                        </div>

                        <div>

                            <h3 class="font-bold text-gray-800 text-lg">
                                Frozen Food & Pre-Order
                            </h3>

                            <p class="text-gray-500 mt-1">
                                Cocok untuk reseller, catering, dan hampers.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- =========================
SERVICES
========================= --}}
<section class="py-24 bg-white">

    <div class="container mx-auto px-6 lg:px-14">

        {{-- TITLE --}}
        <div class="text-center max-w-3xl mx-auto">

            <span class="text-orange-500 uppercase tracking-[4px] font-semibold">
                Layanan Kami
            </span>

            <h2 class="mt-5 text-4xl md:text-5xl font-black text-gray-800">

                Solusi Kuliner
                Modern Untuk Semua

            </h2>

            <p class="mt-6 text-lg text-gray-500 leading-relaxed">

                Pempek Ratu hadir dengan berbagai layanan
                untuk memenuhi kebutuhan pelanggan secara fleksibel.

            </p>

        </div>

        {{-- CARDS --}}
        <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-8 mt-16">

            {{-- CARD --}}
            <div class="group bg-gray-50 hover:bg-orange-500 rounded-[32px] p-8 transition-all duration-500 shadow-md hover:shadow-2xl hover:-translate-y-3">

                <div class="w-16 h-16 rounded-3xl bg-orange-100 group-hover:bg-white/20 flex items-center justify-center text-3xl transition">

                    🍽️

                </div>

                <h3 class="mt-6 text-2xl font-bold text-gray-800 group-hover:text-white transition">

                    Ready Stock

                </h3>

                <p class="mt-4 text-gray-500 group-hover:text-orange-100 leading-relaxed transition">

                    Produk siap beli dan siap dinikmati setiap hari.

                </p>

            </div>

            {{-- CARD --}}
            <div class="group bg-gray-50 hover:bg-orange-500 rounded-[32px] p-8 transition-all duration-500 shadow-md hover:shadow-2xl hover:-translate-y-3">

                <div class="w-16 h-16 rounded-3xl bg-orange-100 group-hover:bg-white/20 flex items-center justify-center text-3xl transition">

                    ❄️

                </div>

                <h3 class="mt-6 text-2xl font-bold text-gray-800 group-hover:text-white transition">

                    Frozen Food

                </h3>

                <p class="mt-4 text-gray-500 group-hover:text-orange-100 leading-relaxed transition">

                    Pempek beku berkualitas premium tahan lama dan praktis.

                </p>

            </div>

            {{-- CARD --}}
            <div class="group bg-gray-50 hover:bg-orange-500 rounded-[32px] p-8 transition-all duration-500 shadow-md hover:shadow-2xl hover:-translate-y-3">

                <div class="w-16 h-16 rounded-3xl bg-orange-100 group-hover:bg-white/20 flex items-center justify-center text-3xl transition">

                    🛍️

                </div>

                <h3 class="mt-6 text-2xl font-bold text-gray-800 group-hover:text-white transition">

                    Reseller

                </h3>

                <p class="mt-4 text-gray-500 group-hover:text-orange-100 leading-relaxed transition">

                    Mendukung kebutuhan reseller dan bisnis kuliner Anda.

                </p>

            </div>

            {{-- CARD --}}
            <div class="group bg-gray-50 hover:bg-orange-500 rounded-[32px] p-8 transition-all duration-500 shadow-md hover:shadow-2xl hover:-translate-y-3">

                <div class="w-16 h-16 rounded-3xl bg-orange-100 group-hover:bg-white/20 flex items-center justify-center text-3xl transition">

                    🎁

                </div>

                <h3 class="mt-6 text-2xl font-bold text-gray-800 group-hover:text-white transition">

                    Hampers

                </h3>

                <p class="mt-4 text-gray-500 group-hover:text-orange-100 leading-relaxed transition">

                    Paket hampers premium untuk hadiah dan acara spesial.

                </p>

            </div>

        </div>

    </div>

</section>

{{-- =========================
CTA
========================= --}}
<section class="relative py-24 overflow-hidden bg-gradient-to-r from-orange-500 via-orange-600 to-orange-700">

    <div class="absolute inset-0 bg-[url('/images/hero-pempek.jpg')] bg-cover bg-center opacity-10"></div>

    <div class="container relative z-10 mx-auto px-6 lg:px-14 text-center">

        <h2 class="text-4xl md:text-5xl font-black text-white leading-tight">

            Nikmati Pempek Premium
            Khas Palembang Hari Ini

        </h2>

        <p class="mt-6 text-orange-100 text-lg max-w-2xl mx-auto leading-relaxed">

            Pesan sekarang dan rasakan cita rasa autentik
            Pempek Ratu dengan kualitas terbaik.

        </p>

        <div class="mt-10 flex flex-wrap justify-center gap-5">

            <a href="/produk"
               class="bg-white text-orange-600 hover:bg-orange-50 px-8 py-4 rounded-2xl font-bold shadow-2xl transition hover:scale-105">

                🍽️ Lihat Produk

            </a>

            <a href="https://wa.me/628123456789"
               class="bg-white/10 hover:bg-white/20 border border-white/20 text-white px-8 py-4 rounded-2xl font-semibold backdrop-blur-xl transition">

                📲 Hubungi Kami

            </a>

        </div>

    </div>

</section>

@endsection