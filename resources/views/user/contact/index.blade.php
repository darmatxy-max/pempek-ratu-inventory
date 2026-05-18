@extends('layouts.app')

@section('content')

{{-- =========================
HERO CONTACT
========================= --}}
<section class="relative overflow-hidden bg-[#0f0f0f] pt-36 pb-24">

    {{-- BACKGROUND --}}
    <div class="absolute inset-0">

        <img src="{{ asset('images/hero-pempek.jpg') }}"
             class="w-full h-full object-cover opacity-20">

        <div class="absolute inset-0 bg-black/80"></div>

        <div class="absolute inset-0 bg-gradient-to-r from-black via-black/80 to-orange-900/30"></div>

    </div>

    {{-- GLOW --}}
    <div class="absolute -top-32 -left-32 w-[420px] h-[420px] bg-orange-500/20 rounded-full blur-3xl"></div>

    <div class="absolute -bottom-32 -right-32 w-[420px] h-[420px] bg-yellow-500/10 rounded-full blur-3xl"></div>

    {{-- CONTENT --}}
    <div class="relative container mx-auto px-6 lg:px-14 text-center">

        {{-- BADGE --}}
        <div class="inline-flex items-center gap-3 bg-white/10 border border-white/10 backdrop-blur-xl px-5 py-3 rounded-full">

            <span class="w-2.5 h-2.5 bg-orange-400 rounded-full animate-pulse"></span>

            <span class="text-orange-200 text-sm tracking-wide font-medium">
                Hubungi Pempek Ratu
            </span>

        </div>

        {{-- TITLE --}}
        <h1 class="mt-8 text-5xl md:text-7xl font-black leading-tight text-white">

            Kami Siap
            <span class="text-orange-400">
                Membantu
            </span>

            Anda

        </h1>

        {{-- DESC --}}
        <p class="mt-8 max-w-3xl mx-auto text-lg md:text-xl text-gray-300 leading-relaxed">

            Hubungi kami untuk pemesanan, informasi produk,
            kerjasama reseller, catering, ataupun konsultasi kebutuhan hampers.

        </p>

    </div>

</section>

{{-- =========================
CONTACT SECTION
========================= --}}
<section class="relative py-24 bg-gradient-to-b from-gray-50 to-white overflow-hidden">

    {{-- ORNAMENT --}}
    <div class="absolute top-0 left-0 w-72 h-72 bg-orange-100 rounded-full blur-3xl opacity-50"></div>

    <div class="absolute bottom-0 right-0 w-72 h-72 bg-yellow-100 rounded-full blur-3xl opacity-50"></div>

    <div class="container mx-auto px-6 lg:px-14 relative z-10">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            {{-- LEFT --}}
            <div>

                <span class="text-orange-500 uppercase tracking-[4px] font-semibold">
                    Kontak Kami
                </span>

                <h2 class="mt-5 text-4xl md:text-5xl font-black leading-tight text-gray-800">

                    Terhubung
                    Dengan Tim
                    Pempek Ratu

                </h2>

                <p class="mt-8 text-lg text-gray-600 leading-relaxed">

                    Kami siap melayani kebutuhan pempek premium Anda
                    dengan pelayanan cepat, ramah, dan profesional.

                </p>

                {{-- CONTACT LIST --}}
                <div class="mt-10 space-y-6">

                    {{-- WHATSAPP --}}
                    <div class="flex items-start gap-5 bg-white rounded-3xl p-6 shadow-lg border border-gray-100 hover:shadow-2xl transition">

                        <div class="w-16 h-16 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center text-3xl shrink-0">

                            📲

                        </div>

                        <div>

                            <h3 class="text-xl font-bold text-gray-800">
                                WhatsApp
                            </h3>

                            <p class="text-gray-500 mt-2">
                                Hubungi kami langsung melalui WhatsApp.
                            </p>

                            <a href="https://wa.me/6287811480175"
                               target="_blank"
                               class="inline-block mt-3 text-green-600 font-semibold hover:underline">

                                0878-1148-0175

                            </a>

                        </div>

                    </div>

                    {{-- EMAIL --}}
                    <div class="flex items-start gap-5 bg-white rounded-3xl p-6 shadow-lg border border-gray-100 hover:shadow-2xl transition">

                        <div class="w-16 h-16 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center text-3xl shrink-0">

                            ✉️

                        </div>

                        <div>

                            <h3 class="text-xl font-bold text-gray-800">
                                Email
                            </h3>

                            <p class="text-gray-500 mt-2">
                                Kirim pertanyaan dan kerjasama bisnis.
                            </p>

                            <a href="mailto:pempekratu@gmail.com"
                               class="inline-block mt-3 text-orange-600 font-semibold hover:underline">

                                pempekratu@gmail.com

                            </a>

                        </div>

                    </div>

                    {{-- LOCATION --}}
                    <div class="flex items-start gap-5 bg-white rounded-3xl p-6 shadow-lg border border-gray-100 hover:shadow-2xl transition">

                        <div class="w-16 h-16 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center text-3xl shrink-0">

                            📍

                        </div>

                        <div>

                            <h3 class="text-xl font-bold text-gray-800">
                                Lokasi
                            </h3>

                            <p class="text-gray-500 mt-2 leading-relaxed">

                                Palembang, Sumatera Selatan,
                                Indonesia.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

            {{-- RIGHT --}}
            <div class="relative">

                {{-- CARD --}}
                <div class="relative bg-white rounded-[40px] shadow-2xl overflow-hidden border border-gray-100">

                    {{-- IMAGE --}}
                    <img src="{{ asset('images/about-pempek.jpg') }}"
                         class="w-full h-[320px] object-cover">

                    {{-- CONTENT --}}
                    <div class="p-10">

                        <span class="inline-flex items-center gap-2 bg-orange-100 text-orange-600 px-4 py-2 rounded-full text-sm font-semibold">

                            ⭐ Pelayanan Terbaik

                        </span>

                        <h3 class="mt-6 text-4xl font-black text-gray-800 leading-tight">

                            Pempek Premium
                            Khas Palembang

                        </h3>

                        <p class="mt-5 text-gray-600 leading-relaxed text-lg">

                            Nikmati cita rasa autentik dengan kualitas premium,
                            pelayanan modern, dan sistem pemesanan online yang praktis.

                        </p>

                        {{-- BUTTONS --}}
                        <div class="mt-8 flex flex-wrap gap-4">

                            <a href="https://wa.me/6287811480175"
                               target="_blank"
                               class="bg-green-500 hover:bg-green-600 text-white px-7 py-4 rounded-2xl font-semibold shadow-lg transition hover:scale-105">

                                Chat WhatsApp

                            </a>

                            <a href="/produk"
                               class="bg-orange-500 hover:bg-orange-600 text-white px-7 py-4 rounded-2xl font-semibold shadow-lg transition hover:scale-105">

                                Lihat Produk

                            </a>

                        </div>

                    </div>

                </div>

                {{-- FLOATING BOX --}}
                <div class="absolute -bottom-8 -left-8 bg-orange-500 text-white rounded-3xl px-8 py-6 shadow-2xl hidden lg:block">

                    <h3 class="text-3xl font-black">
                        1000+
                    </h3>

                    <p class="mt-2 text-orange-100">
                        Pelanggan Puas
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- =========================
CTA SECTION
========================= --}}
<section class="relative py-24 overflow-hidden bg-gradient-to-r from-orange-500 via-orange-600 to-orange-700">

    <div class="absolute inset-0 bg-[url('/images/hero-pempek.jpg')] bg-cover bg-center opacity-10"></div>

    <div class="container relative z-10 mx-auto px-6 lg:px-14 text-center">

        <h2 class="text-4xl md:text-5xl font-black text-white leading-tight">

            Siap Menikmati
            Pempek Premium?

        </h2>

        <p class="mt-6 text-orange-100 text-lg max-w-2xl mx-auto leading-relaxed">

            Pesan sekarang dan rasakan cita rasa autentik
            khas Palembang langsung dari Pempek Ratu.

        </p>

        <div class="mt-10 flex flex-wrap justify-center gap-5">

            <a href="/produk"
               class="bg-white text-orange-600 hover:bg-orange-50 px-8 py-4 rounded-2xl font-bold shadow-2xl transition hover:scale-105">

                🍽️ Pesan Sekarang

            </a>

            <a href="https://wa.me/6287811480175"
               target="_blank"
               class="bg-white/10 hover:bg-white/20 border border-white/20 text-white px-8 py-4 rounded-2xl font-semibold backdrop-blur-xl transition">

                📲 Chat WhatsApp

            </a>

        </div>

    </div>

</section>

@endsection