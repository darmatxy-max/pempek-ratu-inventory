@extends('admin.layouts.app')

@section('content')

<div class="space-y-8">

    <!-- HEADER -->
    <div>

        <h1 class="text-4xl font-bold text-gray-800">
            Data Pesanan
        </h1>

        <p class="text-gray-500 mt-2">
            Monitoring status pesanan customer
        </p>

    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="px-6 py-5 text-left">
                        Customer
                    </th>

                    <th class="px-6 py-5 text-left">
                        Total
                    </th>

                    <th class="px-6 py-5 text-left">
                        Status Pesanan
                    </th>

                    <th class="px-6 py-5 text-center">
                        Update
                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach($pesanans as $pesanan)

                <tr class="border-b">

                    <!-- CUSTOMER -->
                    <td class="px-6 py-5">

                        <div class="font-semibold">
                            {{ $pesanan->customer->nama ?? '-' }}
                        </div>

                        <div class="text-sm text-gray-500">
                            {{ $pesanan->customer->no_wa ?? '-' }}
                        </div>

                    </td>

                    <!-- TOTAL -->
                    <td class="px-6 py-5 font-bold text-orange-500">

                        Rp {{ number_format($pesanan->total_harga) }}

                    </td>

                    <!-- STATUS -->
                    <td class="px-6 py-5">

                        @if($pesanan->status_pesanan == 'diproses')

                            <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-semibold">
                                Diproses
                            </span>

                        @elseif($pesanan->status_pesanan == 'dikirim')

                            <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold">
                                Dikirim
                            </span>

                        @elseif($pesanan->status_pesanan == 'selesai')

                            <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">
                                Selesai
                            </span>

                        @endif

                    </td>

                    <!-- UPDATE -->
                    <td class="px-6 py-5">

                        <form action="/admin/pesanan/status/{{ $pesanan->id }}"
                              method="POST"
                              class="flex gap-3 items-center justify-center">

                            @csrf

                            <select name="status_pesanan"
                                    class="border border-gray-300 rounded-xl px-4 py-2">

                                <option value="diproses">
                                    Diproses
                                </option>

                                <option value="dikirim">
                                    Dikirim
                                </option>

                                <option value="selesai">
                                    Selesai
                                </option>

                            </select>

                            <button type="submit"
                                    class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2 rounded-xl font-semibold">

                                Update

                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection