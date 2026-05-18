@extends('layouts.app')

@section('content')

<section class="bg-gray-100 min-h-screen py-14">

    <div class="max-w-7xl mx-auto px-4 lg:px-8">

        {{-- HEADER --}}
        <div class="text-center mb-12">

            <h1 class="text-4xl font-extrabold text-gray-800">
                Checkout Pesanan
            </h1>

            <p class="text-gray-500 mt-3 text-lg">
                Lengkapi data pemesanan dan lakukan pembayaran
            </p>

        </div>

        @php
            $cart = session('cart', []);
            $total = 0;
        @endphp

        {{-- CART KOSONG --}}
        @if(count($cart) < 1)

        <div class="bg-white rounded-3xl shadow-lg p-12 text-center">

            <div class="text-6xl mb-5">
                🛒
            </div>

            <h2 class="text-3xl font-bold text-gray-700">
                Keranjang Belanja Kosong
            </h2>

            <p class="text-gray-500 mt-4">
                Silakan pilih produk terlebih dahulu sebelum checkout.
            </p>

            <a href="/produk"
               class="inline-block mt-8 bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-2xl font-bold transition duration-300 shadow-lg">

                Belanja Sekarang

            </a>

        </div>

        @else

        <div class="grid lg:grid-cols-3 gap-8">

            {{-- FORM CHECKOUT --}}
            <div class="lg:col-span-2">

                <form action="/checkout/process"
                      method="POST"
                      enctype="multipart/form-data"
                      class="bg-white rounded-3xl shadow-xl p-8 space-y-7">

                    @csrf

                    {{-- INFORMASI CUSTOMER --}}
                    <div>

                        <h2 class="text-2xl font-bold text-gray-800 mb-6">
                            Informasi Customer
                        </h2>

                        <div class="grid md:grid-cols-2 gap-5">

                            {{-- NAMA --}}
                            <div>

                                <label class="font-semibold text-gray-700">
                                    Nama Lengkap
                                </label>

                                <input type="text"
                                       name="nama"
                                       required
                                       placeholder="Masukkan nama lengkap"
                                       class="w-full mt-2 border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-orange-400 focus:outline-none">

                            </div>

                            {{-- WHATSAPP --}}
                            <div>

                                <label class="font-semibold text-gray-700">
                                    Nomor WhatsApp
                                </label>

                                <input type="text"
                                       name="no_wa"
                                       required
                                       placeholder="08xxxxxxxxxx"
                                       class="w-full mt-2 border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-orange-400 focus:outline-none">

                            </div>

                        </div>

                    </div>

                    {{-- ALAMAT --}}
                    <div>

                        <label class="font-semibold text-gray-700">
                            Alamat Pengiriman
                        </label>

                        <textarea name="alamat"
                                  rows="5"
                                  required
                                  placeholder="Masukkan alamat lengkap pengiriman"
                                  class="w-full mt-2 border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-orange-400 focus:outline-none"></textarea>

                    </div>

                    {{-- JENIS PESANAN --}}
                    <div>

                        <label class="font-semibold text-gray-700">
                            Jenis Pesanan
                        </label>

                        <select name="jenis_pesanan"
                                class="w-full mt-2 border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-orange-400 focus:outline-none">

                            <option value="ready">
                                Ready Stock
                            </option>

                            <option value="frozen">
                                Frozen Food
                            </option>

                            <option value="preorder">
                                Pre Order H+3
                            </option>

                        </select>

                        <p class="text-sm text-gray-400 mt-2">
                            Pre Order diproses maksimal H+3
                        </p>

                    </div>

                    {{-- METODE PEMBAYARAN --}}
                    <div>

                        <label class="font-semibold text-gray-700">
                            Metode Pembayaran
                        </label>

                        <select name="metode_pembayaran"
                                id="metodePembayaran"
                                required
                                class="w-full mt-2 border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-orange-400 focus:outline-none">

                            <option value="">
                                -- Pilih Metode Pembayaran --
                            </option>

                            <option value="cash">
                                Bayar Cash
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

                    {{-- INFO PEMBAYARAN --}}
                    <div id="infoPembayaran"
                         class="hidden bg-orange-50 border border-orange-200 rounded-2xl p-5">

                        <h3 class="font-bold text-orange-600 text-lg mb-3">
                            Informasi Pembayaran
                        </h3>

                        <div id="paymentContent"
                             class="text-gray-700 leading-8">
                        </div>

                    </div>

                    {{-- BUKTI --}}
                    <div>

                        <label class="font-semibold text-gray-700">
                            Upload Bukti Pembayaran
                        </label>

                        <input type="file"
                               name="bukti_pembayaran"
                               class="w-full mt-2 border border-gray-300 rounded-2xl p-4 bg-white">

                        <p class="text-sm text-gray-400 mt-2">
                            Upload screenshot transfer / pembayaran
                        </p>

                    </div>

                    {{-- CATATAN --}}
                    <div>

                        <label class="font-semibold text-gray-700">
                            Catatan Tambahan
                        </label>

                        <textarea name="catatan"
                                  rows="4"
                                  placeholder="Contoh: pedas sedang, kirim sore hari, dll"
                                  class="w-full mt-2 border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-orange-400 focus:outline-none"></textarea>

                    </div>

                    {{-- FLOW STATUS --}}
                    <div class="bg-blue-50 border border-blue-200 rounded-2xl p-5">

                        <h3 class="font-bold text-blue-700 mb-3">
                            Alur Pemesanan
                        </h3>

                        <div class="flex flex-wrap items-center gap-3 text-sm font-semibold">

                            <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full">
                                Menunggu Konfirmasi
                            </span>

                            →

                            <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full">
                                Diproses
                            </span>

                            →

                            <span class="bg-purple-100 text-purple-700 px-4 py-2 rounded-full">
                                Dikirim
                            </span>

                            →

                            <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full">
                                Selesai
                            </span>

                        </div>

                    </div>

                    {{-- BUTTON --}}
                    <button type="submit"
                            class="w-full bg-orange-500 hover:bg-orange-600 text-white py-4 rounded-2xl font-bold text-lg shadow-lg transition duration-300">

                        Buat Pesanan Sekarang

                    </button>

                </form>

            </div>

            {{-- RINGKASAN --}}
            <div>

                <div class="bg-white rounded-3xl shadow-xl p-8 sticky top-24">

                    <h2 class="text-2xl font-bold text-gray-800">
                        Ringkasan Pesanan
                    </h2>

                    <div class="mt-6 space-y-5">

                        @foreach($cart as $item)

                        @php
                            $qty = $item['qty'] ?? 1;
                            $subtotal = ($item['harga'] ?? 0) * $qty;
                            $total += $subtotal;
                        @endphp

                        <div class="flex justify-between items-start border-b pb-4">

                            <div>

                                <h3 class="font-bold text-gray-800">
                                    {{ $item['nama_produk'] ?? 'Produk' }}
                                </h3>

                                <p class="text-sm text-gray-500 mt-1">
                                    Qty : {{ $qty }}
                                </p>

                            </div>

                            <div class="font-bold text-orange-500 text-right">

                                Rp {{ number_format($subtotal) }}

                            </div>

                        </div>

                        @endforeach

                    </div>

                    {{-- TOTAL --}}
                    <div class="mt-8 pt-6 border-t flex justify-between items-center">

                        <span class="text-xl font-bold text-gray-700">
                            Total
                        </span>

                        <span class="text-3xl font-extrabold text-orange-500">
                            Rp {{ number_format($total) }}
                        </span>

                    </div>

                    {{-- INFO --}}
                    <div class="mt-6 bg-yellow-50 border border-yellow-200 rounded-2xl p-4">

                        <p class="text-sm text-yellow-700 leading-7">

                            Setelah checkout, pesanan akan masuk ke status:

                            <span class="font-bold">
                                Menunggu Konfirmasi
                            </span>

                            dan admin akan segera memverifikasi pembayaran Anda.

                        </p>

                    </div>

                </div>

            </div>

        </div>

        @endif

    </div>

</section>

<script>

    const metode = document.getElementById('metodePembayaran');
    const infoBox = document.getElementById('infoPembayaran');
    const paymentContent = document.getElementById('paymentContent');

    if (metode) {

        metode.addEventListener('change', function () {

            let value = this.value;

            infoBox.classList.remove('hidden');

            if (value === 'dana') {

                paymentContent.innerHTML = `
                    <p><b>DANA :</b> 081234567890</p>
                    <p>A/N Pempek Ratu</p>
                `;

            } else if (value === 'ovo') {

                paymentContent.innerHTML = `
                    <p><b>OVO :</b> 081234567890</p>
                    <p>A/N Pempek Ratu</p>
                `;

            } else if (value === 'bank') {

                paymentContent.innerHTML = `
                    <p><b>BCA :</b> 1234567890</p>
                    <p>A/N Pempek Ratu</p>
                `;

            } else if (value === 'cash') {

                paymentContent.innerHTML = `
                    <p>Pembayaran dilakukan saat pesanan diterima.</p>
                `;

            } else {

                infoBox.classList.add('hidden');

            }

        });

    }

</script>

@endsection