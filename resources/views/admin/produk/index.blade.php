@extends('admin.layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Data Produk
</h1>

<a href="/admin/produk/create"
   class="bg-orange-500 text-white px-5 py-3 rounded-xl">
    Tambah Produk
</a>

<table class="w-full mt-6 bg-white shadow rounded-xl">

    <thead class="bg-orange-500 text-white">

        <tr>
            <th class="p-4">Gambar</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

    </thead>

    <tbody>

        @foreach($produks as $item)

        <tr class="border-b">

            <td class="p-4">
                <img src="/images/{{ $item->gambar }}"
                     class="w-20 h-20 object-cover rounded-lg">
            </td>

            <td>{{ $item->nama_produk }}</td>

            <td>Rp {{ number_format($item->harga) }}</td>

            <td>{{ $item->status }}</td>

            <td>{{ $item->stok_ready }}</td>

            <td class="space-x-2">

                <a href="/admin/produk/edit/{{ $item->id }}"
                   class="bg-blue-500 text-white px-3 py-2 rounded-lg">
                    Edit
                </a>

                <a href="/admin/produk/delete/{{ $item->id }}"
                   class="bg-red-500 text-white px-3 py-2 rounded-lg">
                    Hapus
                </a>

            </td>

        </tr>

        @endforeach

    </tbody>

</table>

@endsection