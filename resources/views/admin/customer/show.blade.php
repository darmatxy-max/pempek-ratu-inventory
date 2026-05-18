@extends('admin.layouts.app')

@section('content')

<div class="space-y-8">

    <div class="bg-white p-8 rounded-3xl shadow-lg">

        <h1 class="text-3xl font-bold text-gray-800">
            {{ $customer->nama }}
        </h1>

        <p class="text-gray-500 mt-2">
            {{ $customer->no_wa }}
        </p>

        <p class="text-gray-500">
            {{ $customer->alamat }}
        </p>

    </div>

    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

        <div class="p-6 border-b">

            <h2 class="text-2xl font-bold">
                Histori Pesanan
            </h2>

        </div>

        <table class="w-full">

            <thead class="bg-gray-50">

                <tr>

                    <th class="p-5 text-left">Invoice</th>
                    <th class="p-5 text-left">Total</th>
                    <th class="p-5 text-left">Status</th>
                    <th class="p-5 text-left">Tanggal</th>

                </tr>

            </thead>

            <tbody>

                @foreach($customer->pesanans as $pesanan)

                <tr class="border-b">

                    <td class="p-5">
                        #{{ $pesanan->id }}
                    </td>

                    <td class="p-5 font-bold text-orange-500">
                        Rp {{ number_format($pesanan->total_harga) }}
                    </td>

                    <td class="p-5">
                        {{ $pesanan->status_pesanan }}
                    </td>

                    <td class="p-5">
                        {{ $pesanan->created_at->format('d M Y') }}
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection