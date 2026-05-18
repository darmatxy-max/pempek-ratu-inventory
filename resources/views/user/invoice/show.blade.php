@extends('layouts.app')

@section('content')

<section class="bg-gray-100 min-h-screen py-16">

    <div class="max-w-4xl mx-auto bg-white shadow-2xl rounded-3xl p-10">

        <!-- HEADER -->
        <div class="flex justify-between items-center border-b pb-6">

            <div>

                <h1 class="text-4xl font-extrabold text-orange-500">
                    Pempek Ratu
                </h1>

                <p class="text-gray-500 mt-2">
                    Invoice Pesanan
                </p>

            </div>

            <div class="text-right">

                <p class="font-bold text-gray-700">
                    {{ $pesanan->kode_invoice }}
                </p>

                <p class="text-sm text-gray-500">
                    {{ $pesanan->created_at->format('d M Y H:i') }}
                </p>

            </div>

        </div>

        <!-- CUSTOMER -->
        <div class="grid md:grid-cols-2 gap-8 mt-10">

            <div>

                <h3 class="font-bold text-lg mb-3">
                    Data Customer
                </h3>

                <p>{{ $pesanan->customer->nama }}</p>
                <p>{{ $pesanan->customer->no_wa }}</p>
                <p>{{ $pesanan->alamat_pengiriman }}</p>

            </div>

            <div>

                <h3 class="font-bold text-lg mb-3">
                    Status Pesanan
                </h3>

                <p>
                    Status:
                    <span class="font-bold text-orange-500">
                        {{ ucfirst($pesanan->status_pesanan) }}
                    </span>
                </p>

                <p>
                    Pembayaran:
                    <span class="font-bold text-green-600">
                        {{ ucfirst($pesanan->status_pembayaran) }}
                    </span>
                </p>

            </div>

        </div>

        <!-- PRODUK -->
        <div class="mt-10">

            <table class="w-full border-collapse">

                <thead>

                    <tr class="bg-orange-100">

                        <th class="p-4 text-left">
                            Produk
                        </th>

                        <th class="p-4">
                            Qty
                        </th>

                        <th class="p-4">
                            Harga
                        </th>

                        <th class="p-4">
                            Subtotal
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($pesanan->detailPesanan as $detail)

                    <tr class="border-b">

                        <td class="p-4">
                            {{ $detail->produk->nama_produk ?? '-' }}
                        </td>

                        <td class="p-4 text-center">
                            {{ $detail->jumlah }}
                        </td>

                        <td class="p-4 text-center">
                            Rp {{ number_format($detail->harga) }}
                        </td>

                        <td class="p-4 text-center font-bold text-orange-500">
                            Rp {{ number_format($detail->subtotal) }}
                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        <!-- TOTAL -->
        <div class="mt-10 flex justify-end">

            <div class="bg-orange-50 p-6 rounded-2xl w-80">

                <div class="flex justify-between text-xl font-extrabold">

                    <span>Total</span>

                    <span class="text-orange-500">
                        Rp {{ number_format($pesanan->total_harga) }}
                    </span>

                </div>

            </div>

        </div>

        <!-- WA -->
        <div class="mt-10 text-center">

            <a href="https://wa.me/6287811480175?text=Halo Admin, saya ingin konfirmasi invoice {{ $pesanan->kode_invoice }}"
               target="_blank"
               class="bg-green-500 hover:bg-green-600 text-white px-8 py-4 rounded-2xl font-bold inline-block">

                Konfirmasi via WhatsApp

            </a>

        </div>

    </div>

</section>

@endsection