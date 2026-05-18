@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto py-16">

    <h1 class="text-4xl font-bold mb-10">
        Checkout Pesanan
    </h1>

    <form action="/checkout/process" method="POST">

        @csrf

        <div class="grid md:grid-cols-2 gap-10">

            {{-- FORM --}}
            <div class="bg-white p-8 rounded-3xl shadow-lg">

                <h2 class="text-2xl font-bold mb-6">
                    Data Customer
                </h2>

                <div class="space-y-5">

                    <input type="text"
                           name="nama"
                           placeholder="Nama Lengkap"
                           class="w-full border p-4 rounded-2xl">

                    <input type="text"
                           name="no_wa"
                           placeholder="Nomor WhatsApp"
                           class="w-full border p-4 rounded-2xl">

                    <textarea
                        name="alamat"
                        placeholder="Alamat Lengkap"
                        class="w-full border p-4 rounded-2xl h-32"></textarea>

                    <select name="payment_method"
                            class="w-full border p-4 rounded-2xl">

                        <option value="">
                            Pilih Pembayaran
                        </option>

                        <option value="cash">
                            Cash
                        </option>

                        <option value="dana">
                            DANA
                        </option>

                        <option value="ovo">
                            OVO
                        </option>

                        <option value="bank">
                            Transfer Bank
                        </option>

                    </select>

                </div>

            </div>

            {{-- ORDER --}}
            <div class="bg-white p-8 rounded-3xl shadow-lg">

                <h2 class="text-2xl font-bold mb-6">
                    Ringkasan Pesanan
                </h2>

                <div class="space-y-4">

                    @php $total = 0; @endphp

                    @foreach($cart as $item)

                        @php
                            $qty = $item['qty'] ?? 1;
                            $subtotal = $item['harga'] * $qty;

                            $total += $subtotal;
                        @endphp

                        <div class="flex justify-between">

                            <div>

                                <h3 class="font-semibold">
                                    {{ $item['nama_produk'] }}
                                </h3>

                                <p class="text-sm text-gray-500">
                                    x{{ $item['qty'] }}
                                </p>

                            </div>

                            <div class="font-bold">

                                Rp {{ number_format($subtotal) }}

                            </div>

                        </div>

                    @endforeach

                </div>

                <div class="border-t mt-6 pt-6 flex justify-between text-2xl font-bold">

                    <span>Total</span>

                    <span>
                        Rp {{ number_format($total) }}
                    </span>

                </div>

                <button class="w-full bg-orange-500 hover:bg-orange-600 text-white py-4 rounded-2xl font-bold mt-8 transition">

                    Buat Pesanan

                </button>

            </div>

        </div>

    </form>

</div>

@endsection