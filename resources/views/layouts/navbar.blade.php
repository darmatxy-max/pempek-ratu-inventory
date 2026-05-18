<nav class="fixed top-0 left-0 right-0 z-50">

    {{-- BACKDROP --}}
    <div class="absolute inset-0 bg-white/80 backdrop-blur-2xl border-b border-white/20 shadow-[0_8px_30px_rgb(0,0,0,0.04)]"></div>

    <div class="relative container mx-auto px-6 lg:px-12">

        <div class="flex items-center justify-between h-24">

            {{-- =========================
            LOGO
            ========================= --}}
            <a href="/"
               class="flex items-center gap-4 group">

                {{-- LOGO IMAGE --}}
                <div class="relative">

                    <div class="absolute inset-0 bg-orange-400/30 blur-xl rounded-full group-hover:scale-125 transition duration-500"></div>

                    <img src="{{ asset('images/logo.png') }}"
                         alt="Pempek Ratu"
                         class="relative w-14 h-14 object-contain drop-shadow-xl">

                </div>

                {{-- TEXT --}}
                <div>

                    <h1 class="text-2xl font-black tracking-tight text-gray-900">

                        Pempek
                        <span class="text-orange-500">
                            Ratu
                        </span>

                    </h1>

                    <p class="text-xs tracking-[0.25em] uppercase text-gray-400 font-semibold mt-1">

                        Authentic Taste Since 2002

                    </p>

                </div>

            </a>

            {{-- =========================
            DESKTOP MENU
            ========================= --}}
            <div class="hidden lg:flex items-center gap-3">

                @php

                    $menus = [

                        [
                            'title' => 'Home',
                            'url' => '/'
                        ],

                        [
                            'title' => 'Produk',
                            'url' => '/produk'
                        ],

                        [
                            'title' => 'Kemitraan',
                            'url' => '/kemitraan'
                        ],

                        [
                            'title' => 'About',
                            'url' => '/about'
                        ],

                        [
                            'title' => 'Contact',
                            'url' => '/contact'
                        ],

                    ];

                @endphp

                @foreach($menus as $menu)

                <a href="{{ $menu['url'] }}"
                   class="relative px-5 py-3 rounded-2xl font-semibold text-[15px] transition-all duration-300
                   {{ request()->is(trim($menu['url'], '/')) || request()->path() == trim($menu['url'], '/')
                        ? 'bg-orange-500 text-white shadow-lg shadow-orange-200'
                        : 'text-gray-700 hover:text-orange-500 hover:bg-orange-50' }}">

                    {{ $menu['title'] }}

                </a>

                @endforeach

            </div>

            {{-- =========================
            RIGHT MENU
            ========================= --}}
            <div class="flex items-center gap-4">

                {{-- CART --}}
                <a href="/cart"
                   class="hidden sm:flex items-center gap-3 bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-2xl font-semibold shadow-xl shadow-orange-200 transition duration-300 hover:scale-105">

                    <span class="text-lg">
                        🛒
                    </span>

                    <span>
                        Keranjang
                    </span>

                </a>

                {{-- MOBILE BUTTON --}}
                <button id="mobileMenuButton"
                        class="lg:hidden w-12 h-12 rounded-2xl bg-orange-50 text-orange-500 flex items-center justify-center shadow-sm border border-orange-100">

                    ☰

                </button>

            </div>

        </div>

    </div>

    {{-- =========================
    MOBILE MENU
    ========================= --}}
    <div id="mobileMenu"
         class="hidden lg:hidden bg-white/95 backdrop-blur-2xl border-t border-gray-100 shadow-2xl">

        <div class="container mx-auto px-6 py-6 space-y-3">

            <a href="/"
               class="block px-5 py-4 rounded-2xl hover:bg-orange-50 hover:text-orange-500 transition font-semibold text-gray-700">

                Home

            </a>

            <a href="/produk"
               class="block px-5 py-4 rounded-2xl hover:bg-orange-50 hover:text-orange-500 transition font-semibold text-gray-700">

                Produk

            </a>

            <a href="/kemitraan"
               class="block px-5 py-4 rounded-2xl hover:bg-orange-50 hover:text-orange-500 transition font-semibold text-gray-700">

                Kemitraan

            </a>

            <a href="/about"
               class="block px-5 py-4 rounded-2xl hover:bg-orange-50 hover:text-orange-500 transition font-semibold text-gray-700">

                About

            </a>

            <a href="/contact"
               class="block px-5 py-4 rounded-2xl hover:bg-orange-50 hover:text-orange-500 transition font-semibold text-gray-700">

                Contact

            </a>

            <a href="/cart"
               class="flex items-center justify-center gap-3 bg-orange-500 hover:bg-orange-600 text-white px-6 py-4 rounded-2xl font-bold shadow-lg transition">

                🛒 Keranjang

            </a>

        </div>

    </div>

</nav>

{{-- =========================
MOBILE MENU SCRIPT
========================= --}}
<script>

    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const mobileMenu = document.getElementById('mobileMenu');

    mobileMenuButton.addEventListener('click', () => {

        mobileMenu.classList.toggle('hidden');

    });

</script>