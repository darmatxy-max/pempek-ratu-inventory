@extends('admin.layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

    <h1 class="text-3xl font-bold mb-8">
        Tambah Produk
    </h1>

    <form action="/admin/produk/store"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white p-8 rounded-3xl shadow-lg">

        @csrf

        <!-- NAMA -->
        <div class="mb-6">

            <label class="font-semibold block mb-2">
                Nama Produk
            </label>

            <input type="text"
                   name="nama_produk"
                   class="w-full border rounded-2xl px-4 py-3">

        </div>

        <!-- HARGA -->
        <div class="mb-6">

            <label class="font-semibold block mb-2">
                Harga
            </label>

            <input type="number"
                   name="harga"
                   class="w-full border rounded-2xl px-4 py-3">

        </div>

        <!-- STATUS -->
        <div class="mb-6">

            <label class="font-semibold block mb-2">
                Status Produk
            </label>

            <select name="status_produk"
                    class="w-full border rounded-2xl px-4 py-3">

                <option value="ready">Ready</option>
                <option value="frozen">Frozen</option>
                <option value="po">PO +3 Hari</option>

            </select>

        </div>

        <!-- STOK -->
        <div class="mb-6">

            <label class="font-semibold block mb-2">
                Stok Ready
            </label>

            <input type="number"
                   name="stok_ready"
                   class="w-full border rounded-2xl px-4 py-3">

        </div>

        <!-- DESKRIPSI -->
        <div class="mb-6">

            <label class="font-semibold block mb-2">
                Deskripsi
            </label>

            <textarea name="deskripsi"
                      rows="5"
                      class="w-full border rounded-2xl px-4 py-3"></textarea>

        </div>

        <!-- GAMBAR -->
        <div class="mb-6">

            <label class="font-semibold block mb-2">
                Gambar Produk
            </label>

            <input type="file"
                   name="gambar"
                   class="w-full">

        </div>

        <!-- BUTTON -->
        <button class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-2xl font-bold">

            Simpan Produk

        </button>

    </form>

</div>

@endsection