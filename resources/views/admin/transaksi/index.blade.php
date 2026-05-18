@extends('admin.layouts.app')

@section('content')

<div class="space-y-8">

    <!-- HEADER -->
    <div class="flex justify-between items-center">

        <div>
            <h1 class="text-4xl font-bold text-gray-800">
                Data Transaksi
            </h1>

            <p class="text-gray-500 mt-2">
                Monitoring pembayaran customer
            </p>
        </div>

    </div>

    <!-- ALERT -->
    @if(session('success'))

        <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl">

            {{ session('success') }}

        </div>

    @endif

    @if(session('error'))

        <div class="bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-2xl">

            {{ session('error') }}

        </div>

    @endif

    <!-- TABLE -->
    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <!-- HEADER TABLE -->
                <thead class="bg-gray-100 text-gray-700">

                    <tr>

                        <th class="px-6 py-5 text-left font-bold">
                            Customer
                        </th>

                        <th class="px-6 py-5 text-left font-bold">
                            Invoice
                        </th>

                        <th class="px-6 py-5 text-left font-bold">
                            Total
                        </th>

                        <th class="px-6 py-5 text-left font-bold">
                            Pembayaran
                        </th>

                        <th class="px-6 py-5 text-left font-bold">
                            Status
                        </th>

                        <th class="px-6 py-5 text-left font-bold">
                            Bukti
                        </th>

                        <th class="px-6 py-5 text-center font-bold">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <!-- BODY -->
                <tbody>

                    @forelse($pesanans as $pesanan)

                    <tr class="border-b hover:bg-gray-50 transition">

                        <!-- CUSTOMER -->
                        <td class="px-6 py-5">

                            <div class="font-semibold text-gray-800">
                                {{ $pesanan->customer->nama ?? '-' }}
                            </div>

                            <div class="text-sm text-gray-500 mt-1">
                                {{ $pesanan->customer->no_wa ?? '-' }}
                            </div>

                        </td>

                        <!-- INVOICE -->
                        <td class="px-6 py-5">

                            <div class="font-semibold text-gray-700">
                                {{ $pesanan->kode_invoice }}
                            </div>

                        </td>

                        <!-- TOTAL -->
                        <td class="px-6 py-5">

                            <div class="font-bold text-orange-500 text-lg">
                                Rp {{ number_format($pesanan->total_harga) }}
                            </div>

                        </td>

                        <!-- PEMBAYARAN -->
                        <td class="px-6 py-5">

                            <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold capitalize">

                                {{ $pesanan->metode_pembayaran }}

                            </span>

                        </td>

                        <!-- STATUS -->
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

                        <!-- BUKTI -->
                        <td class="px-6 py-5">

                            @if($pesanan->bukti_pembayaran)

                                <a href="{{ asset('storage/'.$pesanan->bukti_pembayaran) }}"
                                   target="_blank"
                                   class="text-blue-500 hover:text-blue-700 font-semibold underline">

                                    Lihat Bukti

                                </a>

                            @else

                                <span class="text-gray-400">
                                    Tidak Ada
                                </span>

                            @endif

                        </td>

                        <!-- AKSI -->
                        <td class="px-6 py-5 text-center">

                            @if($pesanan->status_pembayaran == 'pending')

                                <div class="flex flex-col gap-3">

                                    <!-- KONFIRMASI -->
                                    <a href="/admin/transaksi/konfirmasi/{{ $pesanan->id }}"
                                       class="bg-green-500 hover:bg-green-600 text-white text-center px-5 py-3 rounded-xl font-semibold transition">

                                        Konfirmasi

                                    </a>

                                    <!-- TOLAK -->
                                    <form action="/admin/transaksi/{{ $pesanan->id }}/tolak"
                                          method="POST">

                                        @csrf

                                        <button type="submit"
                                                class="w-full bg-red-500 hover:bg-red-600 text-white px-5 py-3 rounded-xl font-semibold transition">

                                            Tolak

                                        </button>

                                    </form>

                                </div>

                            @elseif($pesanan->status_pembayaran == 'lunas')

                                <div class="text-green-600 font-bold">

                                    Sudah Dikonfirmasi

                                </div>

                            @else

                                <div class="text-red-600 font-bold">

                                    Pembayaran Ditolak

                                </div>

                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7" class="py-16 text-center">

                            <div class="text-gray-400 text-lg">

                                Belum ada transaksi

                            </div>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection