<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Pempek Ratu</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <script src="https://unpkg.com/feather-icons"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>

        body{
            font-family:'Poppins',sans-serif;
        }

        ::-webkit-scrollbar{
            width:6px;
        }

        ::-webkit-scrollbar-thumb{
            background:#f97316;
            border-radius:999px;
        }

        .sidebar-scroll::-webkit-scrollbar{
            width:4px;
        }

        .sidebar-scroll::-webkit-scrollbar-thumb{
            background:rgba(255,255,255,.25);
        }

        .dropdown-menu{
            opacity:0;
            visibility:hidden;
            transform:translateY(10px);
            transition:all .25s ease;
        }

        .dropdown-menu.show{
            opacity:1;
            visibility:visible;
            transform:translateY(0);
        }

        .dark{
            background:#0f172a;
            color:white;
        }

        .dark header{
            background:#111827 !important;
            border-color:#1f2937 !important;
        }

        .dark main{
            background:#0f172a !important;
        }

        .dark .card-dark{
            background:#1e293b !important;
            color:white !important;
            border-color:#334155 !important;
        }

        .dark input{
            color:white !important;
        }

        .dark input::placeholder{
            color:#94a3b8 !important;
        }

    </style>

</head>

<body id="body"
      class="bg-gray-100 text-gray-800 transition-all duration-300 overflow-hidden">
@php

    use Illuminate\Support\Facades\Auth;

    $pendingPesanan = \App\Models\Pesanan::where('status_pembayaran','pending')->count();

    $totalPenjualan = \App\Models\Pesanan::where('status_pembayaran','lunas')
        ->whereMonth('created_at', now()->month)
        ->whereYear('created_at', now()->year)
        ->sum('total_harga');

  $admin = Auth::user();

@endphp

<div class="flex h-screen overflow-hidden">

    {{-- SIDEBAR --}}
    <aside class="fixed left-0 top-0 w-72 h-screen bg-gradient-to-b from-orange-500 via-orange-600 to-orange-700 text-white shadow-2xl z-50 flex flex-col">

        {{-- LOGO --}}
        <div class="px-7 py-8 border-b border-orange-400/40">

            <div class="flex items-center gap-4">

                <div class="w-16 h-16 rounded-3xl bg-white/15 flex items-center justify-center shadow-lg">

                    <i data-feather="shopping-bag" class="w-8 h-8"></i>

                </div>

                <div>

                    <h1 class="text-3xl font-extrabold leading-tight tracking-wide">
                        PEMPEK<br>RATU
                    </h1>

                    <p class="text-orange-100 text-sm mt-1">
                        Premium Admin Panel
                    </p>

                </div>

            </div>

        </div>

        {{-- MENU --}}
        <nav class="flex-1 px-5 py-6 space-y-3 overflow-y-auto sidebar-scroll">

            @php

                $menus = [

                    [
                        'url' => 'admin/dashboard',
                        'icon' => 'home',
                        'title' => 'Dashboard'
                    ],

                    [
                        'url' => 'admin/produk',
                        'icon' => 'shopping-cart',
                        'title' => 'Produk'
                    ],

                    [
                        'url' => 'admin/transaksi',
                        'icon' => 'credit-card',
                        'title' => 'Transaksi'
                    ],

                    [
                        'url' => 'admin/kemitraan',
                        'icon' => 'users',
                        'title' => 'Kemitraan'
                    ],

                    [
                        'url' => 'admin/laporan',
                        'icon' => 'bar-chart-2',
                        'title' => 'Laporan'
                    ],

                    [
                        'url' => 'admin/customer',
                        'icon' => 'user',
                        'title' => 'Customer'
                    ],

                ];

            @endphp

            @foreach($menus as $menu)

            <a href="/{{ $menu['url'] }}"
               class="search-item group flex items-center justify-between px-5 py-4 rounded-2xl transition-all duration-300
               {{ request()->is($menu['url'].'*')
                    ? 'bg-white text-orange-600 shadow-xl font-semibold'
                    : 'hover:bg-white/10 hover:translate-x-1' }}">

                <div class="flex items-center gap-4">

                    <i data-feather="{{ $menu['icon'] }}"
                       class="group-hover:scale-110 transition"></i>

                    <span class="text-[15px]">
                        {{ $menu['title'] }}
                    </span>

                </div>

                @if($menu['title'] == 'Transaksi' && $pendingPesanan > 0)

                    <span class="bg-red-500 text-white text-xs w-6 h-6 rounded-full flex items-center justify-center font-bold shadow">

                        {{ $pendingPesanan }}

                    </span>

                @endif

            </a>

            @endforeach

        </nav>

        {{-- CARD --}}
        <div class="p-5">

            <div class="bg-white/10 backdrop-blur-xl rounded-3xl p-6 border border-white/10 shadow-xl">

                <div class="flex items-center justify-between">

                    <div class="w-12 h-12 rounded-2xl bg-white/20 flex items-center justify-center">

                        <i data-feather="trending-up"></i>

                    </div>

                    <span class="text-green-300 text-sm font-semibold">
                        Real Time
                    </span>

                </div>

                <p class="text-orange-100 text-sm mt-5">
                    Penjualan Bulan Ini
                </p>

                <h2 class="text-3xl font-extrabold mt-2">
                    Rp {{ number_format($totalPenjualan) }}
                </h2>

            </div>

        </div>

    </aside>

    {{-- MAIN --}}
    <div class="flex-1 ml-72 flex flex-col h-screen">

        {{-- HEADER --}}
        <header id="header"
                class="fixed top-0 left-72 right-0 h-24 bg-white border-b border-gray-200 z-40 px-8 flex items-center justify-between shadow-sm transition-all duration-300">

            {{-- LEFT --}}
            <div>

                <h2 class="text-3xl font-bold">
                    Admin Panel
                </h2>

                <p class="text-gray-500 mt-1 text-sm">
                    Sistem Manajemen Pempek Ratu
                </p>

            </div>

            {{-- RIGHT --}}
            <div class="flex items-center gap-4">

                {{-- SEARCH --}}
                <div id="searchBox"
                     class="hidden xl:flex items-center bg-gray-100 rounded-2xl px-4 h-12 w-72 border border-gray-200">

                    <i data-feather="search" class="w-5 h-5 text-gray-400"></i>

                    <input
                        type="text"
                        id="searchInput"
                        placeholder="Cari menu atau data..."
                        class="bg-transparent outline-none ml-3 text-sm w-full"
                    >

                </div>

                {{-- DARK MODE --}}
                <button id="darkToggle"
                        class="w-12 h-12 rounded-2xl bg-gray-100 hover:bg-gray-200 transition flex items-center justify-center border border-gray-200">

                    <i data-feather="moon" id="darkIcon"></i>

                </button>

                {{-- NOTIFIKASI --}}
                <div class="relative">

                    <button class="w-12 h-12 rounded-2xl bg-gray-100 hover:bg-gray-200 transition flex items-center justify-center border border-gray-200">

                        <i data-feather="bell"></i>

                    </button>

                    @if($pendingPesanan > 0)

                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center font-bold shadow">

                        {{ $pendingPesanan }}

                    </span>

                    @endif

                </div>

                {{-- PROFILE --}}
                <div class="relative">

                    <button id="profileButton"
                            class="flex items-center gap-3 bg-white border border-gray-200 px-3 py-2 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300">

                        <img src="{{ asset('images/admin.png') }}"
     onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($admin->name ?? 'Admin') }}&background=f97316&color=fff'"
                             alt="Admin"
                             class="w-12 h-12 rounded-xl object-cover border-2 border-orange-300">

                        <div class="text-left hidden md:block">
                        <h3 class="font-bold text-gray-800 leading-tight">
                            {{ $admin->name ?? 'Admin' }}
                        </h3>

                        <p class="text-sm text-gray-400">
                            {{ $admin->email ?? 'Super Admin' }}
                        </p>

                        </div>

                        <i data-feather="chevron-down" class="w-4 h-4 text-gray-400"></i>

                    </button>

                    {{-- DROPDOWN --}}
                    <div id="profileDropdown"
                         class="dropdown-menu absolute right-0 mt-3 w-56 bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden card-dark">

                        <a href="/admin/profile"
                           class="flex items-center gap-3 px-5 py-4 hover:bg-gray-100 transition">

                            <i data-feather="user"></i>

                            Profil Saya

                        </a>

                        <a href="/admin/pengaturan"
                           class="flex items-center gap-3 px-5 py-4 hover:bg-gray-100 transition">

                            <i data-feather="settings"></i>

                            Pengaturan

                        </a>

                        <div class="border-t border-gray-100"></div>

                        <form action="/admin/logout" method="POST">
                            @csrf

                            <button type="submit"
                                    class="w-full flex items-center gap-3 px-5 py-4 text-red-500 hover:bg-red-50 transition">

                                <i data-feather="log-out"></i>

                                Logout

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </header>

        {{-- CONTENT --}}
        <main id="mainContent"
              class="flex-1 overflow-y-auto pt-32 px-8 pb-8 bg-gray-100 transition-all duration-300">

            @yield('content')

        </main>

    </div>

</div>

<script>

    feather.replace();

    // =========================
    // DARK MODE
    // =========================

    const body = document.getElementById('body');
    const header = document.getElementById('header');
    const mainContent = document.getElementById('mainContent');
    const darkToggle = document.getElementById('darkToggle');

    function enableDarkMode(){

        body.classList.add('dark');

        localStorage.setItem('darkMode', 'enabled');

    }

    function disableDarkMode(){

        body.classList.remove('dark');

        localStorage.setItem('darkMode', 'disabled');

    }

    if(localStorage.getItem('darkMode') === 'enabled'){

        enableDarkMode();

    }

    darkToggle.addEventListener('click', () => {

        if(localStorage.getItem('darkMode') !== 'enabled'){

            enableDarkMode();

        }else{

            disableDarkMode();

        }

    });

    // =========================
    // PROFILE DROPDOWN
    // =========================

    const profileButton = document.getElementById('profileButton');
    const profileDropdown = document.getElementById('profileDropdown');

    profileButton.addEventListener('click', () => {

        profileDropdown.classList.toggle('show');

    });

    window.addEventListener('click', function(e){

        if(!profileButton.contains(e.target) &&
           !profileDropdown.contains(e.target)){

            profileDropdown.classList.remove('show');

        }

    });

    // =========================
    // SEARCH
    // =========================

    const searchInput = document.getElementById('searchInput');

    searchInput.addEventListener('keyup', function(){

        const keyword = this.value.toLowerCase();

        const items = document.querySelectorAll(
            'table tbody tr, .search-item'
        );

        items.forEach((item) => {

            const text = item.innerText.toLowerCase();

            if(text.includes(keyword)){

                item.style.display = '';

            }else{

                item.style.display = 'none';

            }

        });

    });

</script>

</body>
</html>