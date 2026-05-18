<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Pesanan;
use App\Models\DetailPesanan;
use App\Models\Produk;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        return view('user.checkout.index', compact('cart'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_wa' => 'required',
            'alamat' => 'required',
            'metode_pembayaran' => 'required',
            'bukti_pembayaran' => 'nullable|image'
        ]);

        $cart = session()->get('cart', []);

        if(count($cart) == 0){
            return back()->with('error', 'Keranjang kosong');
        }

        /*
        |--------------------------------------------------------------------------
        | VALIDASI STOK
        |--------------------------------------------------------------------------
        */

        foreach($cart as $id => $item){

            $produk = Produk::find($id);

            if(!$produk || $produk->stok_ready < $item['qty']){

                return back()->with(
                    'error',
                    'Stok '.$produk->nama_produk.' tidak cukup'
                );
            }
        }

        /*
        |--------------------------------------------------------------------------
        | UPLOAD BUKTI
        |--------------------------------------------------------------------------
        */

        $bukti = null;

        if($request->hasFile('bukti_pembayaran')){

            $bukti = $request->file('bukti_pembayaran')
                            ->store('bukti', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | CUSTOMER
        |--------------------------------------------------------------------------
        */

        $customer = Customer::create([
            'nama' => $request->nama,
            'no_wa' => $request->no_wa,
            'alamat' => $request->alamat
        ]);

        /*
        |--------------------------------------------------------------------------
        | TOTAL
        |--------------------------------------------------------------------------
        */

        $total = 0;

        foreach($cart as $item){

            $total += $item['harga'] * $item['qty'];
        }

        /*
        |--------------------------------------------------------------------------
        | KODE INVOICE
        |--------------------------------------------------------------------------
        */

        $invoice = 'INV-' . date('Ymd') . '-' . rand(1000,9999);

        /*
        |--------------------------------------------------------------------------
        | PESANAN
        |--------------------------------------------------------------------------
        */

        $pesanan = Pesanan::create([

            'customer_id' => $customer->id,

            'jenis_pesanan' => 'website',

            'tanggal_preorder' => now(),

            'total_harga' => $total,

            'status_pesanan' => 'menunggu konfirmasi',

            'status_pembayaran' => 'pending',

            'metode_pembayaran' => $request->metode_pembayaran,

            'bukti_pembayaran' => $bukti,

            'alamat_pengiriman' => $request->alamat,

            'catatan' => $request->catatan,

            'kode_invoice' => $invoice
        ]);

        /*
        |--------------------------------------------------------------------------
        | DETAIL PESANAN
        |--------------------------------------------------------------------------
        */

        foreach($cart as $id => $item){

            DetailPesanan::create([

                'pesanan_id' => $pesanan->id,

                'produk_id' => $id,

                'jumlah' => $item['qty'],

                'harga' => $item['harga'],

                'subtotal' => $item['harga'] * $item['qty']
            ]);

            /*
            |--------------------------------------------------------------------------
            | UPDATE STOK
            |--------------------------------------------------------------------------
            */

            $produk = Produk::find($id);

            $produk->stok_ready -= $item['qty'];

            if($produk->stok_ready < 0){
                $produk->stok_ready = 0;
            }

            $produk->save();
        }

        /*
        |--------------------------------------------------------------------------
        | HAPUS CART
        |--------------------------------------------------------------------------
        */

        session()->forget('cart');

        /*
        |--------------------------------------------------------------------------
        | REDIRECT WA ADMIN
        |--------------------------------------------------------------------------
        */

        $pesanWA = urlencode(
            "Halo Admin Pempek Ratu,%0A%0A".
            "Saya sudah melakukan checkout.%0A".
            "Invoice: ".$invoice."%0A".
            "Nama: ".$request->nama."%0A".
            "Total: Rp ".number_format($total)."%0A%0A".
            "Mohon segera dikonfirmasi."
        );

        $wa = "https://wa.me/6287811480175?text=".$pesanWA;

        return redirect('/invoice/'.$pesanan->id)
    ->with('wa_link', $wa);
    }

    public function invoice($id)
{
    $pesanan = Pesanan::with([
        'customer',
        'detailPesanan.produk'
    ])->findOrFail($id);

    return view('user.invoice.index', compact('pesanan'));
}

    /*
    |--------------------------------------------------------------------------
    | LIST PESANAN
    |--------------------------------------------------------------------------
    */

    public function pesanan()
    {
        $pesanans = Pesanan::latest()->get();

        return view('user.pesanan.index', compact('pesanans'));
    }
}