@extends('admin.layouts.app')

@section('content')

<div class="space-y-8">

    {{-- HEADER --}}
    <div>
        <h1 class="text-4xl font-bold text-gray-800">
            Customer Management
        </h1>

        <p class="text-gray-500 mt-2">
            Data customer dan histori transaksi
        </p>
    </div>

    {{-- TABLE --}}
    <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-gray-100">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-gray-50">

                    <tr class="text-gray-600">

                        <th class="p-5 text-left">Customer</th>
                        <th class="p-5 text-left">WhatsApp</th>
                        <th class="p-5 text-left">Total Order</th>
                        <th class="p-5 text-left">Total Belanja</th>
                        <th class="p-5 text-left">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($customers as $customer)

                    <tr class="border-b hover:bg-orange-50 transition">

                        <td class="p-5 font-semibold text-gray-800">
                            {{ $customer->nama }}
                        </td>

                        <td class="p-5">
                            {{ $customer->no_wa }}
                        </td>

                        <td class="p-5">
                            {{ $customer->pesanans_count }}
                        </td>

                        <td class="p-5 font-bold text-orange-500">
                            Rp {{ number_format($customer->pesanans_sum_total_harga ?? 0) }}
                        </td>

                        <td class="p-5">

                            <a href="/admin/customer/{{ $customer->id }}"
                               class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2 rounded-xl">

                                Detail

                            </a>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5"
                            class="p-10 text-center text-gray-400">

                            Belum ada customer

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection