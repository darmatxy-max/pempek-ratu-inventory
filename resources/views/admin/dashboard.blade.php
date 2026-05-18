@extends('admin.layouts.app')

@section('content')

<div class="space-y-8">

    {{-- HEADER --}}
    <div class="flex justify-between items-center">

        <div>

            <h1 class="text-3xl font-bold text-gray-800">
                Dashboard
            </h1>

            <p class="text-gray-500 mt-1">
                Monitoring bisnis Pempek Ratu
            </p>

        </div>

        <div class="bg-white px-5 py-3 rounded-2xl shadow border">

            <p class="text-sm text-gray-500">
                Hari Ini
            </p>

            <h2 class="font-bold text-lg text-gray-800">
                {{ now()->translatedFormat('d F Y') }}
            </h2>

        </div>

    </div>

    {{-- CARD --}}
    <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-6">

        {{-- PRODUK --}}
        <div class="bg-white p-6 rounded-3xl shadow border">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-gray-500 text-sm">
                        Total Produk
                    </p>

                    <h2 class="text-4xl font-bold text-orange-500 mt-3">
                        {{ $totalProduk }}
                    </h2>

                </div>

                <div class="text-5xl">
                    📦
                </div>

            </div>

        </div>

        {{-- PESANAN --}}
        <div class="bg-white p-6 rounded-3xl shadow border">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-gray-500 text-sm">
                        Total Pesanan
                    </p>

                    <h2 class="text-4xl font-bold text-green-500 mt-3">
                        {{ $totalPesanan }}
                    </h2>

                </div>

                <div class="text-5xl">
                    🛒
                </div>

            </div>

        </div>

        {{-- CUSTOMER --}}
        <div class="bg-white p-6 rounded-3xl shadow border">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-gray-500 text-sm">
                        Customer
                    </p>

                    <h2 class="text-4xl font-bold text-blue-500 mt-3">
                        {{ $totalCustomer }}
                    </h2>

                </div>

                <div class="text-5xl">
                    👤
                </div>

            </div>

        </div>

        {{-- PENJUALAN --}}
        <div class="bg-white p-6 rounded-3xl shadow border">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-gray-500 text-sm">
                        Penjualan Bulan Ini
                    </p>

                    <h2 class="text-2xl font-bold text-purple-500 mt-3">
                        Rp {{ number_format($pendapatanBulanIni) }}
                    </h2>

                </div>

                <div class="text-5xl">
                    💰
                </div>

            </div>

        </div>

    </div>

    {{-- NOTIFIKASI --}}
    @if($pendingPesanan > 0)

    <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-5">

        <div class="flex items-center gap-4">

            <div class="text-3xl">
                🔔
            </div>

            <div>

                <h3 class="font-bold text-yellow-700">
                    Notifikasi Pesanan
                </h3>

                <p class="text-yellow-600 text-sm mt-1">
                    Ada {{ $pendingPesanan }} pesanan menunggu konfirmasi pembayaran.
                </p>

            </div>

        </div>

    </div>

    @endif

    {{-- PESANAN TERBARU --}}
    <div class="bg-white rounded-3xl shadow border overflow-hidden">

        <div class="p-6 border-b">

            <h2 class="text-2xl font-bold text-gray-800">
                Pesanan Terbaru
            </h2>

            <p class="text-gray-500 text-sm mt-1">
                Daftar transaksi customer terbaru
            </p>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-gray-50">

                    <tr class="text-left text-gray-600 text-sm">

                        <th class="px-6 py-4">
                            Invoice
                        </th>

                        <th class="px-6 py-4">
                            Total
                        </th>

                        <th class="px-6 py-4">
                            Pembayaran
                        </th>

                        <th class="px-6 py-4">
                            Status
                        </th>

                        <th class="px-6 py-4">
                            Tanggal
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($pesananTerbaru as $pesanan)

                    <tr class="border-b hover:bg-gray-50">

                        {{-- INVOICE --}}
                        <td class="px-6 py-5 font-semibold text-gray-800">

                            {{ $pesanan->kode_invoice }}

                        </td>

                        {{-- TOTAL --}}
                        <td class="px-6 py-5 font-bold text-orange-500">

                            Rp {{ number_format($pesanan->total_harga) }}

                        </td>

                        {{-- PEMBAYARAN --}}
                        <td class="px-6 py-5">

                            @if($pesanan->status_pembayaran == 'lunas')

                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">
                                    Lunas
                                </span>

                            @elseif($pesanan->status_pembayaran == 'ditolak')

                                <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-semibold">
                                    Ditolak
                                </span>

                            @else

                                <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-semibold">
                                    Pending
                                </span>

                            @endif

                        </td>

                        {{-- STATUS PESANAN --}}
                        <td class="px-6 py-5">

                            @if($pesanan->status_pesanan == 'menunggu konfirmasi')

                                <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-semibold">
                                    Menunggu Konfirmasi
                                </span>

                            @elseif($pesanan->status_pesanan == 'diproses')

                                <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold">
                                    Diproses
                                </span>

                            @elseif($pesanan->status_pesanan == 'dikirim')

                                <span class="bg-purple-100 text-purple-700 px-4 py-2 rounded-full text-sm font-semibold">
                                    Dikirim
                                </span>

                            @elseif($pesanan->status_pesanan == 'selesai')

                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">
                                    Selesai
                                </span>

                            @else

                                <span class="bg-gray-100 text-gray-700 px-4 py-2 rounded-full text-sm font-semibold">
                                    {{ $pesanan->status_pesanan }}
                                </span>

                            @endif

                        </td>

                        {{-- TANGGAL --}}
                        <td class="px-6 py-5 text-gray-500">

                            {{ $pesanan->created_at->format('d M Y H:i') }}

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5"
                            class="text-center py-10 text-gray-400">

                            Belum ada pesanan

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection