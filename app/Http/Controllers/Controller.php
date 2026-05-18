<?php

namespace App\Http\Controllers;

abstract class Controller
{
   public function show($id)
{
    $produk = Produk::findOrFail($id);

    return view('user.detail_produk', compact('produk'));
}
}


