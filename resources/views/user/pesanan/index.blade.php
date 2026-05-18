@extends('layouts.app')

@section('content')

<section class="py-16 bg-gray-100 min-h-screen">

<div class="container mx-auto px-6">

    <h1 class="text-4xl font-bold mb-10">
        Pesanan Saya
    </h1>

    <div class="space-y-6">

        @forelse($pesanans as $pesanan)

        <div class="bg-white p-8 rounded-3xl shadow-lg border border-gray-100">

            {{-- TOP --}}
            <div class="flex flex-col lg:flex-row lg:justify-between gap-5">

                <div>

                    <h2 class="font-bold text-2xl text-gray-800">
                        Pesanan #{{ $pesanan->id }}
                    </h2>

                    <p class="text-gray-500 mt-2">
                        {{ $pesanan->created_at->format('d M Y H:i') }}
                    </p>

                </div>

                <div class="text-left lg:text-right">

                    <p class="font-bold text-orange-500 text-3xl">
                        Rp {{ number_format($pesanan->total_harga) }}
                    </p>

                    {{-- STATUS --}}
                    @if($pesanan->status_pesanan == 'pending')

                        <span class="inline-block mt-3 px-4 py-2 rounded-full bg-yellow-100 text-yellow-700 text-sm font-semibold">

                            Menunggu Konfirmasi

                        </span>

                    @elseif($pesanan->status_pesanan == 'diproses')

                        <span class="inline-block mt-3 px-4 py-2 rounded-full bg-blue-100 text-blue-700 text-sm font-semibold">

                            Sedang Diproses

                        </span>

                    @elseif($pesanan->status_pesanan == 'dikirim')

                        <span class="inline-block mt-3 px-4 py-2 rounded-full bg-purple-100 text-purple-700 text-sm font-semibold">

                            Sedang Dikirim

                        </span>

                    @elseif($pesanan->status_pesanan == 'selesai')

                        <span class="inline-block mt-3 px-4 py-2 rounded-full bg-green-100 text-green-700 text-sm font-semibold">

                            Pesanan Selesai

                        </span>

                    @endif

                </div>

            </div>

            <hr class="my-6">

            {{-- INFO --}}
            <div class="grid lg:grid-cols-2 gap-5">

                <div>

                    <p class="text-gray-500">
                        Status Pembayaran
                    </p>

                    <h3 class="font-bold text-lg mt-1">
                        {{ $pesanan->status_pembayaran }}
                    </h3>

                </div>

                <div>

                    <p class="text-gray-500">
                        Metode Pembayaran
                    </p>

                    <h3 class="font-bold text-lg mt-1">
                        {{ $pesanan->metode_pembayaran }}
                    </h3>

                </div>

            </div>

            {{-- TRACKING --}}
            @if($pesanan->status_pesanan == 'dikirim')

            <div class="mt-6 bg-purple-50 border border-purple-200 rounded-2xl p-5">

                <h3 class="font-bold text-purple-700 text-lg mb-4">
                    Tracking Pengiriman
                </h3>

                <div class="space-y-3">

                    {{-- KURIR --}}
                    <div>

                        <span class="text-gray-500">
                            Kurir:
                        </span>

                        <strong>
                            {{ $pesanan->kurir ?? '-' }}
                        </strong>

                    </div>

                    {{-- RESI --}}
                    <div>

                        <span class="text-gray-500">
                            Nomor Resi:
                        </span>

                        <strong>
                            {{ $pesanan->nomor_resi ?? '-' }}
                        </strong>

                    </div>

                    {{-- ESTIMASI --}}
                    <div>

                        <span class="text-gray-500">
                            Estimasi:
                        </span>

                        <strong>

                            @if($pesanan->kurir == 'GoSend')

                                1-2 Jam

                            @elseif($pesanan->kurir == 'Grab')

                                1-2 Jam

                            @elseif($pesanan->kurir == 'Maxim')

                                1-2 Jam

                            @elseif($pesanan->kurir == 'Paxel')

                                Same Day / Next Day

                            @elseif($pesanan->kurir == 'JNE')

                                1-3 Hari

                            @elseif($pesanan->kurir == 'SiCepat')

                                1-2 Hari

                            @else

                                Menyesuaikan Kurir

                            @endif

                        </strong>

                    </div>

                </div>

            </div>

            @endif

            {{-- STATUS PRODUK PO --}}
            @if($pesanan->status_pesanan == 'menunggu_produksi')

            <div class="mt-6 bg-orange-50 border border-orange-200 rounded-2xl p-5">

                <h3 class="font-bold text-orange-600">
                    Produk sedang diproduksi
                </h3>

                <p class="text-orange-500 mt-2">
                    Estimasi produksi 2-3 hari sebelum dikirim.
                </p>

            </div>

            @endif

        </div>

        @empty

        <div class="bg-white rounded-3xl shadow-lg p-10 text-center">

            <h2 class="text-2xl font-bold text-gray-700">
                Belum Ada Pesanan
            </h2>

            <p class="text-gray-500 mt-3">
                Yuk mulai belanja Pempek Ratu 🍤
            </p>

        </div>

        @endforelse

    </div>

</div>

</section>

@endsection