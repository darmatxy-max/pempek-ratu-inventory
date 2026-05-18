<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;

class CartController extends Controller
{
    public function add(Request $request)
{
    $produk = Produk::findOrFail($request->produk_id);

    $cart = session()->get('cart', []);

    // jika produk sudah ada
    if(isset($cart[$produk->id])){

        // jika qty belum ada
        if(!isset($cart[$produk->id]['qty'])){
            $cart[$produk->id]['qty'] = 1;
        }

        $cart[$produk->id]['qty']++;

    } else {

        $cart[$produk->id] = [

            'id' => $produk->id,
            'nama_produk' => $produk->nama_produk,
            'harga' => $produk->harga,
            'gambar' => $produk->gambar,
            'qty' => 1

        ];
    }

    session()->put('cart', $cart);

    return redirect('/cart')
        ->with('success', 'Produk berhasil ditambahkan');
}

public function addQty($id)
{
    $cart = session()->get('cart');

    if(isset($cart[$id])){
        $cart[$id]['qty']++;
    }

    session()->put('cart', $cart);

    return back();
}

public function minQty($id)
{
    $cart = session()->get('cart');

    if(isset($cart[$id])){

        if($cart[$id]['qty'] > 1){
            $cart[$id]['qty']--;
        } else {
            unset($cart[$id]);
        }
    }

    session()->put('cart', $cart);

    return back();
}

    public function index()
    {
        return view('user.cart.index');
    }

    public function increase($id)
{
    $cart = session()->get('cart');

    if(isset($cart[$id])) {
        $cart[$id]['qty']++;
    }

    session()->put('cart', $cart);

    return back();

    if($cart[$id]['qty'] >= $produk->stok_ready){

    return back()->with('error', 'Stok tidak mencukupi');

}
}


public function decrease($id)
{
    $cart = session()->get('cart');

    if(isset($cart[$id])) {

        if($cart[$id]['qty'] > 1) {
            $cart[$id]['qty']--;
        } else {
            unset($cart[$id]);
        }
    }

    session()->put('cart', $cart);

    return back();
}
public function update(Request $request, $id)
{
    $cart = session()->get('cart', []);

    if(isset($cart[$id])){

        $cart[$id]['qty'] = $request->qty;

        session()->put('cart', $cart);

    }

    return back()->with('success', 'Jumlah produk berhasil diupdate');
}
public function remove($id)
{
    $cart = session()->get('cart', []);

    if(isset($cart[$id])){
        unset($cart[$id]);

        session()->put('cart', $cart);
    }

    return back()->with('success', 'Produk dihapus dari keranjang');
}

}