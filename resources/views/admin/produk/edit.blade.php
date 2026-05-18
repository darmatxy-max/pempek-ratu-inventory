@extends('admin.layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Edit Produk
</h1>

<form action="/admin/produk/update/{{ $produk->id }}"
      method="POST"
      enctype="multipart/form-data"
      class="bg-white p-8 rounded-2xl shadow">

    @csrf

    <div class="mb-5">

        <label>Nama Produk</label>

        <input type="text"
               name="nama_produk"
               value="{{ $produk->nama_produk }}"
               class="w-full border p-3 rounded-xl">

    </div>

    <div class="mb-5">

        <label>Harga</label>

        <input type="number"
               name="harga"
               value="{{ $produk->harga }}"
               class="w-full border p-3 rounded-xl">

    </div>

    <div class="mb-5">

        <label>Stok</label>

        <input type="number"
               name="stok_ready"
               value="{{ $produk->stok_ready }}"
               class="w-full border p-3 rounded-xl">

    </div>

    <div class="mb-5">

        <label>Status</label>

        <select name="status"
                class="w-full border p-3 rounded-xl">

            <option value="ready"
                {{ $produk->status == 'ready' ? 'selected' : '' }}>
                Ready
            </option>

            <option value="frozen"
                {{ $produk->status == 'frozen' ? 'selected' : '' }}>
                Frozen
            </option>

            <option value="po"
                {{ $produk->status == 'po' ? 'selected' : '' }}>
                PO
            </option>

        </select>

    </div>

    <div class="mb-5">

        <label>Deskripsi</label>

        <textarea name="deskripsi"
                  class="w-full border p-3 rounded-xl">{{ $produk->deskripsi }}</textarea>

    </div>

    <div class="mb-5">

        <label>Gambar Baru</label>

        <input type="file"
               name="gambar"
               class="w-full border p-3 rounded-xl">

    </div>

    <button class="bg-orange-500 text-white px-6 py-3 rounded-xl">
        Update Produk
    </button>

</form>

@endsection