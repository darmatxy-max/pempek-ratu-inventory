<?php

namespace App\Http\Controllers\Admin;

use App\Models\Produk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ProdukController extends Controller
{
    // tampil data
    public function index()
    {
        $produks = Produk::latest()->get();

        return view('admin.produk.index', compact('produks'));
    }

    // form create
    public function create()
    {
        return view('admin.produk.create');
    }

    // simpan produk
    public function store(Request $request)
{
    $gambar = null;

    if($request->hasFile('gambar')){

        $file = $request->file('gambar');

        $gambar = time().'.'.$file->getClientOriginalExtension();

        $file->move(public_path('images'), $gambar);
    }

    Produk::create([

    'nama_produk' => $request->nama_produk,

    'harga' => $request->harga,

    'stok_ready' => $request->stok_ready,

    'stok_frozen' => 0,

    'jenis' => 'pempek',

    'gambar' => $gambar,

    'deskripsi' => $request->deskripsi,

    'stok' => $request->stok_ready,

    'kategori' => 'makanan',

    'status' => $request->status_produk

]);

    return redirect('/admin/produk')
        ->with('success','Produk berhasil ditambahkan');
}

public function edit($id)
{
    $produk = Produk::findOrFail($id);

    return view('admin.produk.edit', compact('produk'));
}

public function update(Request $request, $id)
{
    $produk = Produk::findOrFail($id);

    $gambar = $produk->gambar;

    // upload gambar baru
    if($request->hasFile('gambar')){

        $file = $request->file('gambar');

        $gambar = time().'.'.$file->getClientOriginalExtension();

        $file->move(public_path('images'), $gambar);
    }

    $produk->update([

        'nama_produk' => $request->nama_produk,
        'harga' => $request->harga,
        'stok_ready' => $request->stok_ready,
        'deskripsi' => $request->deskripsi,
        'gambar' => $gambar,
        'status' => $request->status

    ]);

    return redirect('/admin/produk')
            ->with('success','Produk berhasil diupdate');
}


public function destroy($id)
{
    $produk = Produk::findOrFail($id);

    $produk->delete();

    return back()->with('success','Produk berhasil dihapus');
}
}

