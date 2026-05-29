@extends('admin.layouts.app')

@section('content')

<div class="space-y-8">

    <!-- HEADER -->
    <div class="flex items-center justify-between flex-wrap gap-4">

        <div>

            <h1 class="text-4xl font-black text-gray-800">
                Data Kemitraan
            </h1>

            <p class="text-gray-500 mt-2">
                Monitoring pendaftaran mitra Pempek Ratu
            </p>

        </div>

        <!-- TOTAL -->
        <div class="bg-orange-500 text-white px-6 py-4 rounded-3xl shadow-lg">

            <div class="text-sm opacity-80">
                Total Mitra
            </div>

            <div class="text-3xl font-black">
                {{ count($kemitraans) }}
            </div>

        </div>

    </div>

    <!-- ALERT -->
    @if(session('success'))

        <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl">

            {{ session('success') }}

        </div>

    @endif

    <!-- TABLE -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">

        <div class="overflow-x-auto">

            <table class="w-full min-w-[1000px]">

                <!-- HEADER -->
                <thead class="bg-gray-100 text-gray-700">

                    <tr>

                        <th class="px-6 py-5 text-left font-bold">
                            Nama
                        </th>

                        <th class="px-6 py-5 text-left font-bold">
                            No HP
                        </th>

                        <th class="px-6 py-5 text-left font-bold">
                            Alamat
                        </th>

                        <th class="px-6 py-5 text-left font-bold">
                            Jenis Mitra
                        </th>

                        <th class="px-6 py-5 text-left font-bold">
                            Status
                        </th>

                        <th class="px-6 py-5 text-center font-bold">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <!-- BODY -->
                <tbody>

                    @forelse($kemitraans as $item)

                    <tr class="border-b hover:bg-orange-50/40 transition">

                        <!-- NAMA -->
                        <td class="px-6 py-5">

                            <div class="font-bold text-gray-800">
                                {{ $item->nama }}
                            </div>

                        </td>

                        <!-- NO HP -->
                        <td class="px-6 py-5 text-gray-600">

                            {{ $item->no_hp }}

                        </td>

                        <!-- ALAMAT -->
                        <td class="px-6 py-5 text-gray-600 max-w-xs">

                            {{ $item->alamat }}

                        </td>

                        <!-- JENIS MITRA -->
                        <td class="px-6 py-5">

                            @if($item->jenis_mitra == 'Reseller')

                                <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold">
                                    Reseller
                                </span>

                            @elseif($item->jenis_mitra == 'Catering')

                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">
                                    Catering
                                </span>

                            @elseif($item->jenis_mitra == 'Hampers')

                                <span class="bg-purple-100 text-purple-700 px-4 py-2 rounded-full text-sm font-semibold">
                                    Hampers
                                </span>

                            @else

                                <span class="bg-gray-100 text-gray-700 px-4 py-2 rounded-full text-sm font-semibold">
                                    {{ $item->jenis_mitra }}
                                </span>

                            @endif

                        </td>

                        <!-- STATUS -->
                        <td class="px-6 py-5">

                            @if($item->status == 'Menunggu')

                                <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-semibold">

                                    Menunggu

                                </span>

                            @elseif($item->status == 'Diterima')

                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">

                                    Diterima

                                </span>

                            @elseif($item->status == 'Ditolak')

                                <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-semibold">

                                    Ditolak

                                </span>

                            @endif

                        </td>

                        <!-- AKSI -->
                        <td class="px-6 py-5">

                            @if($item->status == 'Menunggu')

                                <div class="flex items-center justify-center gap-3">

                                    <!-- KONFIRMASI -->
                                    <a href="/admin/kemitraan/konfirmasi/{{ $item->id }}"
                                       class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-xl font-semibold transition">

                                        Konfirmasi

                                    </a>

                                    <!-- TOLAK -->
                                    <a href="/admin/kemitraan/tolak/{{ $item->id }}"
                                       class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-xl font-semibold transition">

                                        Tolak

                                    </a>

                                </div>

                            @elseif($item->status == 'Diterima')

                                <div class="text-green-600 font-bold text-center">

                                    Sudah Diterima

                                </div>

                            @else

                                <div class="text-red-500 font-bold text-center">

                                    Pengajuan Ditolak

                                </div>

                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6" class="py-16 text-center">

                            <div class="text-6xl mb-4">
                                🤝
                            </div>

                            <div class="text-2xl font-bold text-gray-700">
                                Belum Ada Data Kemitraan
                            </div>

                            <p class="text-gray-400 mt-3">
                                Data pendaftaran mitra akan muncul di sini
                            </p>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection