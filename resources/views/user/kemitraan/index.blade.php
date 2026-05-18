@extends('layouts.app')

@section('content')

{{-- =========================
HERO SECTION
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
                Program Kemitraan UMKM Pempek Ratu
            </span>

        </div>

        {{-- TITLE --}}
        <h1 class="mt-8 text-5xl md:text-7xl font-black leading-tight text-white">

            Bergabung
            Menjadi
            <span class="text-orange-400">
                Mitra Kami
            </span>

        </h1>

        {{-- DESC --}}
        <p class="mt-8 max-w-3xl mx-auto text-lg md:text-xl text-gray-300 leading-relaxed">

            Kesempatan menjadi reseller, partner catering,
            maupun distributor produk Pempek Ratu
            dengan sistem modern dan keuntungan menarik.

        </p>

    </div>

</section>

{{-- =========================
MAIN SECTION
========================= --}}
<section class="relative py-24 bg-gradient-to-b from-gray-50 to-white overflow-hidden">

    {{-- ORNAMENT --}}
    <div class="absolute top-0 left-0 w-72 h-72 bg-orange-100 rounded-full blur-3xl opacity-50"></div>

    <div class="absolute bottom-0 right-0 w-72 h-72 bg-yellow-100 rounded-full blur-3xl opacity-50"></div>

    <div class="container mx-auto px-6 lg:px-14 relative z-10">

        {{-- ALERT --}}
        @if(session('success'))

        <div class="mb-10 bg-green-100 border border-green-200 text-green-700 px-6 py-5 rounded-2xl shadow-sm">

            {{ session('success') }}

        </div>

        @endif

        <div class="grid lg:grid-cols-2 gap-12 items-start">

            {{-- =========================
            FORM
            ========================= --}}
            <div class="bg-white rounded-[36px] shadow-2xl border border-gray-100 overflow-hidden">

                {{-- HEADER --}}
                <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-8 py-8 text-white">

                    <h2 class="text-3xl font-black">
                        Form Pendaftaran
                    </h2>

                    <p class="mt-2 text-orange-100">

                        Isi data berikut untuk bergabung
                        bersama Pempek Ratu.

                    </p>

                </div>

                {{-- FORM --}}
                <div class="p-8">

                    <form action="/kemitraan/store" method="POST" class="space-y-6">

                        @csrf

                        {{-- NAMA --}}
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-3">
                                Nama Lengkap
                            </label>

                            <input type="text"
                                   name="nama"
                                   class="w-full rounded-2xl border border-gray-200 px-5 py-4 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition"
                                   placeholder="Masukkan nama lengkap"
                                   required>

                        </div>

                        {{-- WHATSAPP --}}
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-3">
                                Nomor WhatsApp
                            </label>

                            <input type="text"
                                   name="no_hp"
                                   class="w-full rounded-2xl border border-gray-200 px-5 py-4 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition"
                                   placeholder="08xxxxxxxxxx"
                                   required>

                        </div>

                        {{-- ALAMAT --}}
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-3">
                                Alamat
                            </label>

                            <textarea
                                name="alamat"
                                rows="5"
                                class="w-full rounded-2xl border border-gray-200 px-5 py-4 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition resize-none"
                                placeholder="Masukkan alamat lengkap"
                                required></textarea>

                        </div>

                        {{-- JENIS --}}
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-3">
                                Jenis Kemitraan
                            </label>

                            <select
                                name="jenis_mitra"
                                class="w-full rounded-2xl border border-gray-200 px-5 py-4 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition">

                                <option value="Reseller">
                                    Reseller
                                </option>

                                <option value="Catering">
                                    Catering
                                </option>

                                <option value="Hampers">
                                    Hampers
                                </option>

                            </select>

                        </div>

                        {{-- BUTTON --}}
                        <button type="submit"
                                class="w-full bg-orange-500 hover:bg-orange-600 text-white py-4 rounded-2xl font-bold shadow-xl hover:shadow-orange-200 transition duration-300 hover:scale-[1.01]">

                            Daftar Kemitraan

                        </button>

                    </form>

                </div>

            </div>

            {{-- =========================
            RIGHT SIDE
            ========================= --}}
            <div class="space-y-8">

                {{-- BENEFIT --}}
                <div class="bg-white rounded-[36px] shadow-2xl border border-gray-100 p-8">

                    <span class="inline-flex items-center gap-2 bg-orange-100 text-orange-600 px-4 py-2 rounded-full text-sm font-semibold">

                        ⭐ Keuntungan Mitra

                    </span>

                    <h2 class="mt-6 text-3xl font-black text-gray-800">

                        Benefit Menjadi
                        Partner Kami

                    </h2>

                    <div class="mt-8 space-y-5">

                        <div class="flex items-start gap-4">

                            <div class="w-12 h-12 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center text-xl shrink-0">
                                ✅
                            </div>

                            <div>

                                <h3 class="font-bold text-gray-800">
                                    Harga Khusus Reseller
                                </h3>

                                <p class="text-gray-500 mt-1 text-sm">
                                    Mendapatkan harga terbaik untuk mitra resmi.
                                </p>

                            </div>

                        </div>

                        <div class="flex items-start gap-4">

                            <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center text-xl shrink-0">
                                🍽️
                            </div>

                            <div>

                                <h3 class="font-bold text-gray-800">
                                    Produk Premium
                                </h3>

                                <p class="text-gray-500 mt-1 text-sm">
                                    Pempek khas Palembang dengan kualitas terbaik.
                                </p>

                            </div>

                        </div>

                        <div class="flex items-start gap-4">

                            <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center text-xl shrink-0">
                                🚚
                            </div>

                            <div>

                                <h3 class="font-bold text-gray-800">
                                    Sistem Pre Order H+3
                                </h3>

                                <p class="text-gray-500 mt-1 text-sm">
                                    Cocok untuk catering, hampers, dan event besar.
                                </p>

                            </div>

                        </div>

                        <div class="flex items-start gap-4">

                            <div class="w-12 h-12 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center text-xl shrink-0">
                                📈
                            </div>

                            <div>

                                <h3 class="font-bold text-gray-800">
                                    Dukungan Promosi
                                </h3>

                                <p class="text-gray-500 mt-1 text-sm">
                                    Dibantu promosi dan branding UMKM modern.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- DATA PENDAFTAR --}}
                <div class="bg-white rounded-[36px] shadow-2xl border border-gray-100 p-8">

                    <div class="flex items-center justify-between flex-wrap gap-4">

                        <div>

                            <h2 class="text-3xl font-black text-gray-800">
                                Data Pendaftar
                            </h2>

                            <p class="mt-2 text-gray-500">
                                Daftar calon mitra terbaru.
                            </p>

                        </div>

                        <div class="bg-orange-100 text-orange-600 px-5 py-2 rounded-2xl font-bold">

                            {{ count($resellers) }} Mitra

                        </div>

                    </div>

                    {{-- LIST --}}
                    <div class="mt-8 space-y-5">

                        @forelse($resellers as $r)

                        <div class="flex items-center justify-between gap-4 p-5 rounded-3xl border border-gray-100 hover:shadow-lg transition">

                            <div>

                                <h3 class="font-bold text-gray-800 text-lg">
                                    {{ $r->nama }}
                                </h3>

                                <p class="text-gray-500 text-sm mt-1">
                                    {{ $r->jenis_mitra }}
                                </p>

                            </div>

                            <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-xs font-semibold">

                                {{ $r->status }}

                            </span>

                        </div>

                        @empty

                        <div class="text-center py-12">

                            <div class="text-6xl mb-4">
                                📋
                            </div>

                            <h3 class="text-2xl font-bold text-gray-700">
                                Belum Ada Pendaftar
                            </h3>

                            <p class="mt-3 text-gray-500">
                                Data calon mitra akan muncul di sini.
                            </p>

                        </div>

                        @endforelse

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection