@extends('admin.layouts.app')

@section('content')

<div class="space-y-8">

    {{-- HEADER --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

        <div>

            <h1 class="text-4xl font-extrabold text-gray-800">
                Laporan Transaksi
            </h1>

            <p class="text-gray-500 mt-2">
                Monitoring laporan transaksi dan omzet realtime
            </p>

        </div>

        {{-- ACTION --}}
        <div class="flex items-center gap-3">

            <a href="/admin/laporan/pdf"
               class="bg-red-500 hover:bg-red-600 transition text-white px-6 py-3 rounded-2xl shadow-lg font-semibold flex items-center gap-2">

                📄 Export PDF

            </a>

        </div>

    </div>

    {{-- FILTER --}}
    <div class="bg-white rounded-3xl shadow-lg border p-6">

        <form action="/admin/laporan" method="GET">

            <div class="grid lg:grid-cols-4 gap-5 items-end">

                <div>

                    <label class="text-sm font-semibold text-gray-600 block mb-2">
                        Dari Tanggal
                    </label>

                    <input type="date"
                           name="dari"
                           value="{{ request('dari') }}"
                           class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-400">

                </div>

                <div>

                    <label class="text-sm font-semibold text-gray-600 block mb-2">
                        Sampai Tanggal
                    </label>

                    <input type="date"
                           name="sampai"
                           value="{{ request('sampai') }}"
                           class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-400">

                </div>

                <div>

                    <button type="submit"
                            class="bg-orange-500 hover:bg-orange-600 transition text-white px-6 py-3 rounded-2xl shadow-lg w-full font-semibold">

                        Filter Laporan

                    </button>

                </div>

                <div>

                    <a href="/admin/laporan"
                       class="bg-gray-200 hover:bg-gray-300 transition text-gray-700 px-6 py-3 rounded-2xl shadow w-full block text-center font-semibold">

                        Reset Filter

                    </a>

                </div>

            </div>

        </form>

    </div>

    {{-- STATISTIK --}}
    <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-6">

        {{-- TOTAL OMZET --}}
        <div class="bg-gradient-to-r from-green-500 to-green-400 rounded-3xl p-6 shadow-xl text-white">

            <p class="text-white/80">
                Total Omzet
            </p>

            <h2 class="text-4xl font-extrabold mt-4">
                Rp {{ number_format($totalOmzet) }}
            </h2>

        </div>

        {{-- HARI INI --}}
        <div class="bg-gradient-to-r from-orange-500 to-orange-400 rounded-3xl p-6 shadow-xl text-white">

            <p class="text-white/80">
                Omzet Hari Ini
            </p>

            <h2 class="text-4xl font-extrabold mt-4">
                Rp {{ number_format($omzetHariIni) }}
            </h2>

        </div>

        {{-- BULAN INI --}}
        <div class="bg-gradient-to-r from-blue-500 to-blue-400 rounded-3xl p-6 shadow-xl text-white">

            <p class="text-white/80">
                Omzet Bulan Ini
            </p>

            <h2 class="text-4xl font-extrabold mt-4">
                Rp {{ number_format($omzetBulanIni) }}
            </h2>

        </div>

    </div>

    {{-- TABLE --}}
    <div class="bg-white rounded-3xl shadow-xl border overflow-hidden">

        {{-- HEADER TABLE --}}
        <div class="px-6 py-5 border-b">

            <h2 class="text-2xl font-bold text-gray-800">
                Data Transaksi
            </h2>

            <p class="text-gray-500 text-sm mt-1">
                Semua data transaksi customer realtime
            </p>

        </div>

        {{-- TABLE --}}
        <div class="overflow-x-auto">

            <table class="w-full min-w-[900px]">

                <thead class="bg-gray-100">

                    <tr class="text-gray-600 uppercase text-sm">

                        <th class="p-5 text-left">
                            ID
                        </th>

                        <th class="p-5 text-left">
                            Customer
                        </th>

                        <th class="p-5 text-left">
                            Total
                        </th>

                        <th class="p-5 text-left">
                            Pembayaran
                        </th>

                        <th class="p-5 text-left">
                            Status
                        </th>

                        <th class="p-5 text-left">
                            Tanggal
                        </th>

                        <th class="p-5 text-center">
                            Invoice
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($pesanans as $pesanan)

                    <tr class="border-b hover:bg-orange-50 transition duration-300">

                        {{-- ID --}}
                        <td class="p-5 font-bold text-gray-800">
                            #{{ $pesanan->id }}
                        </td>

                        {{-- CUSTOMER --}}
                        <td class="p-5">
                            {{ $pesanan->customer->nama ?? '-' }}
                        </td>

                        {{-- TOTAL --}}
                        <td class="p-5 font-bold text-orange-500">
                            Rp {{ number_format($pesanan->total_harga) }}
                        </td>

                        {{-- PEMBAYARAN --}}
                        <td class="p-5">

                            @if($pesanan->status_pembayaran == 'lunas')

                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">

                                    Lunas

                                </span>

                            @else

                                <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-semibold">

                                    Pending

                                </span>

                            @endif

                        </td>

                        {{-- STATUS --}}
                        <td class="p-5">

                            @if($pesanan->status_pesanan == 'pending')

                                <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-semibold">

                                    Pending

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
                        <td class="p-5 text-gray-500">
                            {{ $pesanan->created_at->format('d M Y') }}
                        </td>

                        {{-- INVOICE --}}
                       <td class="p-4 text-center">

                <a href="{{ url('/admin/laporan/invoice/'.$pesanan->id) }}"
                target="_blank"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl shadow">

                    Invoice

                </a>

            </td>
                                </tr>

                    @empty

                    <tr>

                        <td colspan="7" class="p-10 text-center text-gray-400">

                            Belum ada data transaksi

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection