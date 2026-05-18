<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;

class InvoiceController extends Controller
{
    public function show($id)
    {
        $pesanan = Pesanan::with([
            'customer',
            'detailPesanan.produk'
        ])->findOrFail($id);

        return view('user.invoice.show', compact('pesanan'));
    }
}