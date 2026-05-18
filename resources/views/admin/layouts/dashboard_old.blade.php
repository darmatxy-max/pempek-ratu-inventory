@extends('admin.layouts.app')

@section('content')

<div class="space-y-8">

    {{-- HEADER --}}
    <div class="flex items-center justify-between">

        <div>
            <h1 class="text-4xl font-extrabold text-gray-800 tracking-tight">
                Dashboard Admin
            </h1>

            <p class="text-gray-500 mt-2 text-lg">
                Monitoring bisnis Pempek Ratu realtime
            </p>
        </div>

        {{-- DATE --}}
        <div class="bg-white px-5 py-3 rounded-2xl shadow-sm border border-gray-100">
            <p class="text-sm text-gray-400">
                Hari Ini
            </p>

            <h3 class="font-bold text-gray-700">
                {{ now()->format('d M Y') }}
            </h3>
        </div>

    </div>

    {{-- KPI CARD --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        {{-- TOTAL PRODUK --}}
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition">

            <div class="flex items-center justify-between">

                <div class="w-14 h-14 rounded-2xl bg-orange-100 flex items-center justify-center">

                    <i data-feather="shopping-bag" class="w-7 h-7 text-orange-500"></i>

                </div>

                <span class="text-sm text-green-500 font-semibold">
                    +12%
                </span>

            </div>

            <p class="text-gray-500 mt-5 text-sm">
                Total Produk
            </p>

            <h2 class="text-4xl font-extrabold text-gray-800 mt-2">
                {{ $totalProduk }}
            </h2>

        </div>

        {{-- TOTAL TRANSAKSI --}}
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition">

            <div class="flex items-center justify-between">

                <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center">

                    <i data-feather="credit-card" class="w-7 h-7 text-green-500"></i>

                </div>

                <span class="text-sm text-green-500 font-semibold">
                    +8%
                </span>

            </div>

            <p class="text-gray-500 mt-5 text-sm">
                Total Transaksi
            </p>

            <h2 class="text-4xl font-extrabold text-gray-800 mt-2">
                {{ $totalTransaksi }}
            </h2>

        </div>

        {{-- TOTAL MITRA --}}
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition">

            <div class="flex items-center justify-between">

                <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center">

                    <i data-feather="users" class="w-7 h-7 text-blue-500"></i>

                </div>

                <span class="text-sm text-green-500 font-semibold">
                    +5%
                </span>

            </div>

            <p class="text-gray-500 mt-5 text-sm">
                Total Mitra
            </p>

            <h2 class="text-4xl font-extrabold text-gray-800 mt-2">
                {{ $totalReseller }}
            </h2>

        </div>

        {{-- TOTAL PENJUALAN --}}
        <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-3xl p-6 shadow-lg text-white">

            <div class="flex items-center justify-between">

                <div class="w-14 h-14 rounded-2xl bg-white/20 flex items-center justify-center">

                    <i data-feather="trending-up" class="w-7 h-7"></i>

                </div>

                <span class="text-sm bg-white/20 px-3 py-1 rounded-full">
                    Bulan Ini
                </span>

            </div>

            <p class="mt-5 text-orange-100 text-sm">
                Total Penjualan
            </p>

            <h2 class="text-4xl font-extrabold mt-2">
                Rp 12JT
            </h2>

        </div>

    </div>

    {{-- ANALYTICS --}}
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        {{-- SALES CHART --}}
        <div class="xl:col-span-2 bg-white rounded-3xl p-7 shadow-sm border border-gray-100">

            <div class="flex items-center justify-between mb-6">

                <div>
                    <h2 class="text-2xl font-bold text-gray-800">
                        Statistik Penjualan
                    </h2>

                    <p class="text-gray-400 text-sm mt-1">
                        Grafik performa bisnis realtime
                    </p>
                </div>

                <button class="px-4 py-2 rounded-xl bg-orange-100 text-orange-600 text-sm font-semibold">
                    Mingguan
                </button>

            </div>

            {{-- FAKE CHART --}}
            <div class="h-80 rounded-3xl bg-gradient-to-br from-orange-50 to-orange-100 flex items-center justify-center border border-dashed border-orange-200">

                <div class="text-center">

                    <i data-feather="bar-chart-2" class="w-16 h-16 text-orange-400 mx-auto"></i>

                    <p class="text-orange-500 font-semibold mt-4">
                        Grafik Penjualan
                    </p>

                    <p class="text-sm text-orange-400 mt-1">
                        Integrasi chart.js nanti
                    </p>

                </div>

            </div>

        </div>

        {{-- RECENT ACTIVITY --}}
        <div class="bg-white rounded-3xl p-7 shadow-sm border border-gray-100">

            <div class="flex items-center justify-between mb-6">

                <div>
                    <h2 class="text-2xl font-bold text-gray-800">
                        Aktivitas
                    </h2>

                    <p class="text-gray-400 text-sm mt-1">
                        Transaksi terbaru
                    </p>
                </div>

                <div class="w-10 h-10 rounded-xl bg-gray-100 flex items-center justify-center">

                    <i data-feather="activity" class="w-5 h-5 text-gray-500"></i>

                </div>

            </div>

            <div class="space-y-5">

                {{-- ITEM --}}
                <div class="flex items-start gap-4">

                    <div class="w-11 h-11 rounded-2xl bg-green-100 flex items-center justify-center">

                        <i data-feather="check" class="w-5 h-5 text-green-600"></i>

                    </div>

                    <div>
                        <h3 class="font-semibold text-gray-700">
                            Pesanan dikonfirmasi
                        </h3>

                        <p class="text-sm text-gray-400">
                            Invoice #INV-20260516
                        </p>
                    </div>

                </div>

                {{-- ITEM --}}
                <div class="flex items-start gap-4">

                    <div class="w-11 h-11 rounded-2xl bg-yellow-100 flex items-center justify-center">

                        <i data-feather="clock" class="w-5 h-5 text-yellow-600"></i>

                    </div>

                    <div>
                        <h3 class="font-semibold text-gray-700">
                            Menunggu pembayaran
                        </h3>

                        <p class="text-sm text-gray-400">
                            Invoice #INV-20260518
                        </p>
                    </div>

                </div>

                {{-- ITEM --}}
                <div class="flex items-start gap-4">

                    <div class="w-11 h-11 rounded-2xl bg-red-100 flex items-center justify-center">

                        <i data-feather="x" class="w-5 h-5 text-red-600"></i>

                    </div>

                    <div>
                        <h3 class="font-semibold text-gray-700">
                            Pesanan ditolak
                        </h3>

                        <p class="text-sm text-gray-400">
                            Invoice #INV-20260520
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection