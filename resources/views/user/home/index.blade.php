@extends('layouts.app')

@section('content')

{{-- =========================================
HERO SECTION
========================================= --}}
<section class="relative min-h-screen overflow-hidden bg-[#0b0b0b] flex items-center">

    {{-- BACKGROUND --}}
    <div class="absolute inset-0">

        <img src="{{ asset('images/hero-pempek.jpg') }}"
             class="w-full h-full object-cover scale-110 animate-pulse">

        <div class="absolute inset-0 bg-black/75"></div>

        <div class="absolute inset-0 bg-gradient-to-r from-black via-black/70 to-orange-900/40"></div>

    </div>

    {{-- PREMIUM GLOW --}}
    <div class="absolute -top-32 -left-32 w-[500px] h-[500px] bg-orange-500/20 rounded-full blur-3xl animate-pulse"></div>

    <div class="absolute -bottom-32 -right-32 w-[500px] h-[500px] bg-yellow-500/10 rounded-full blur-3xl animate-pulse"></div>

    {{-- CONTENT --}}
    <div class="relative container mx-auto px-6 lg:px-14 pt-36 pb-20">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            {{-- LEFT CONTENT --}}
            <div class="text-white">

                {{-- BADGE --}}
                <div class="inline-flex items-center gap-3 bg-white/10 border border-white/10 backdrop-blur-xl px-5 py-3 rounded-full shadow-xl">

                    <span class="w-2.5 h-2.5 bg-orange-400 rounded-full animate-ping"></span>

                    <span class="text-sm tracking-wide text-orange-200 font-medium">
                        UMKM Pempek Ratu • Premium Taste Since 2002
                    </span>

                </div>

                {{-- TITLE --}}
                <h1 class="mt-8 text-5xl md:text-7xl font-black leading-tight">

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
                    dengan bahan premium, produksi higienis,
                    dan pelayanan modern berbasis digital.

                </p>

                {{-- BUTTONS --}}
                <div class="mt-10 flex flex-wrap gap-5">

                    <a href="/produk"
                       class="group bg-orange-500 hover:bg-orange-600 px-8 py-4 rounded-2xl font-semibold shadow-2xl transition duration-300 hover:scale-105 inline-flex items-center gap-3">

                        🍽️ Pesan Sekarang

                        <span class="group-hover:translate-x-1 transition">
                            →
                        </span>

                    </a>

                    <a href="https://wa.me/6287811480175"
                       class="bg-white/10 border border-white/10 backdrop-blur-xl hover:bg-white/20 px-8 py-4 rounded-2xl font-semibold transition duration-300">

                        📲 Hubungi Kami

                    </a>

                </div>

                {{-- STATS --}}
                <div class="grid grid-cols-3 gap-5 mt-14">

                    <div class="bg-white/5 border border-white/10 rounded-3xl p-5 backdrop-blur-md">

                        <h3 class="text-3xl font-black text-orange-400">
                            20+
                        </h3>

                        <p class="text-sm text-gray-300 mt-2">
                            Tahun Pengalaman
                        </p>

                    </div>

                    <div class="bg-white/5 border border-white/10 rounded-3xl p-5 backdrop-blur-md">

                        <h3 class="text-3xl font-black text-orange-400">
                            1000+
                        </h3>

                        <p class="text-sm text-gray-300 mt-2">
                            Pelanggan Setia
                        </p>

                    </div>

                    <div class="bg-white/5 border border-white/10 rounded-3xl p-5 backdrop-blur-md">

                        <h3 class="text-3xl font-black text-orange-400">
                            Fresh
                        </h3>

                        <p class="text-sm text-gray-300 mt-2">
                            Dibuat Harian
                        </p>

                    </div>

                </div>

            </div>

            {{-- RIGHT PRODUCT SHOWCASE --}}
            <div class="hidden lg:flex justify-center relative">

                {{-- MAIN CARD --}}
                <div class="relative w-[560px] h-[650px]">

                    {{-- GLOW --}}
                    <div class="absolute inset-0 bg-orange-500/20 blur-3xl rounded-full"></div>

                    {{-- FLOATING IMAGE CARD --}}
                    <div id="productCard"
                         class="relative h-full rounded-[40px] overflow-hidden border border-white/10 bg-white/10 backdrop-blur-xl shadow-[0_25px_80px_rgba(0,0,0,.45)] transition duration-700 cursor-pointer hover:scale-[1.02]">

                        <img id="heroImage"
                             src="{{ asset('images/hero-pempek.jpg') }}"
                             class="w-full h-full object-cover transition duration-700">

                        {{-- OVERLAY --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>

                        {{-- CONTENT --}}
                        <div class="absolute bottom-0 left-0 right-0 p-8 text-white">

                            <div class="flex justify-between items-center">

                                <div>

                                    <h3 class="text-3xl font-bold">
                                        Pempek Ratu
                                    </h3>

                                    <p class="text-gray-300 mt-2">
                                        Authentic Palembang Taste
                                    </p>

                                </div>

                                <div class="bg-orange-500 px-5 py-3 rounded-2xl font-bold shadow-xl">

                                    ⭐ 4.9

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- FLOATING MINI CARD --}}
                    <div class="absolute -left-10 top-10 bg-white rounded-3xl shadow-2xl p-5 w-52 animate-bounce">

                        <div class="flex items-center gap-4">

                            <img src="{{ asset('images/hero-pempek.jpg') }}"
                                 class="w-14 h-14 rounded-2xl object-cover">

                            <div>

                                <h4 class="font-bold text-gray-800">
                                    Kapal Selam
                                </h4>

                                <p class="text-orange-500 font-bold">
                                    Rp 25K
                                </p>

                            </div>

                        </div>

                    </div>

                    {{-- FLOATING BADGE --}}
                    <div class="absolute -right-6 bottom-16 bg-orange-500 text-white rounded-3xl px-6 py-5 shadow-2xl animate-pulse">

                        <div class="text-3xl font-black">
                            100%
                        </div>

                        <div class="text-sm">
                            Fresh Fish
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- =========================================
BEST PRODUCT SECTION
========================================= --}}
<section class="py-28 bg-gradient-to-b from-gray-50 to-white">

    <div class="container mx-auto px-6 lg:px-14">

        {{-- TITLE --}}
        <div class="text-center max-w-3xl mx-auto">

            <span class="text-orange-500 uppercase tracking-[5px] font-semibold">
                Produk Favorit
            </span>

            <h2 class="mt-5 text-4xl md:text-5xl font-black text-gray-900 leading-tight">

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

                        Pempek khas Palembang dengan kualitas premium dan rasa autentik.

                    </p>

                    {{-- PRICE --}}
                    <div class="mt-5">

                        <span class="text-orange-500 text-3xl font-black">
                            Rp {{ number_format($p->harga) }}
                        </span>

                    </div>

                    {{-- BADGES --}}
                    <div class="flex flex-wrap gap-2 mt-5">

                        <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full font-medium">
                            Ready
                        </span>

                        <span class="bg-blue-100 text-blue-700 text-xs px-3 py-1 rounded-full font-medium">
                            Frozen
                        </span>

                        <span class="bg-orange-100 text-orange-700 text-xs px-3 py-1 rounded-full font-medium">
                            PO H+3
                        </span>

                    </div>

                    {{-- BUTTON --}}
                    <form action="/cart/add" method="POST" class="mt-6">

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

{{-- =========================================
ABOUT SECTION
========================================= --}}
<section class="py-28 bg-white overflow-hidden">

    <div class="container mx-auto px-6 lg:px-14">

        <div class="grid lg:grid-cols-2 gap-20 items-center">

            {{-- IMAGE --}}
            <div class="relative">

                <div class="absolute -top-10 -left-10 w-44 h-44 bg-orange-100 rounded-full blur-3xl"></div>

                <img src="{{ asset('images/about-pempek.jpg') }}"
                     class="relative rounded-[40px] shadow-2xl w-full object-cover hover:scale-[1.02] transition duration-700">

            </div>

            {{-- TEXT --}}
            <div>

                <span class="text-orange-500 uppercase tracking-[5px] font-semibold">
                    Tentang UMKM
                </span>

                <h2 class="mt-5 text-4xl md:text-5xl font-black leading-tight text-gray-900">

                    Cita Rasa Tradisional
                    Dengan Sentuhan Modern

                </h2>

                <p class="mt-8 text-gray-600 text-lg leading-relaxed">

                    UMKM Pempek Ratu merupakan usaha kuliner khas
                    Palembang sejak tahun 2002 yang kini hadir
                    dengan sistem digital modern untuk mempermudah
                    pemesanan dan pelayanan pelanggan.

                </p>

                {{-- FEATURES --}}
                <div class="mt-10 space-y-5">

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-500 flex items-center justify-center font-bold">
                            ✓
                        </div>

                        <span class="font-medium text-gray-700">
                            Sistem Pemesanan Online Modern
                        </span>

                    </div>

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-500 flex items-center justify-center font-bold">
                            ✓
                        </div>

                        <span class="font-medium text-gray-700">
                            Manajemen Inventori Otomatis
                        </span>

                    </div>

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-500 flex items-center justify-center font-bold">
                            ✓
                        </div>

                        <span class="font-medium text-gray-700">
                            Sistem Pre Order H+3
                        </span>

                    </div>

                </div>

                {{-- BUTTON --}}
                <a href="/about"
                   class="inline-flex items-center gap-3 mt-10 bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-2xl font-semibold shadow-xl transition duration-300 hover:scale-105">

                    Tentang Kami →

                </a>

            </div>

        </div>

    </div>

</section>

{{-- =========================================
ANIMATION SCRIPT
========================================= --}}
<script>

    const heroCard = document.getElementById('productCard');
    const heroImage = document.getElementById('heroImage');

    const images = [
        "{{ asset('images/hero-pempek.jpg') }}",
        "{{ asset('images/about-pempek.jpg') }}",
        "{{ asset('images/hero-pempek.jpg') }}"
    ];

    let index = 0;

    heroCard.addEventListener('click', () => {

        index++;

        if(index >= images.length){
            index = 0;
        }

        heroImage.classList.add('scale-110', 'opacity-70');

        setTimeout(() => {

            heroImage.src = images[index];

            heroImage.classList.remove('scale-110', 'opacity-70');

        }, 300);

    });

</script>

@endsection