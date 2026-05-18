<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;

class TransaksiController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::latest()->get();

        return view('admin.transaksi.index', compact('pesanans'));
    }

    public function konfirmasi($id)
    {
        $pesanan = Pesanan::findOrFail($id);

        $pesanan->status_pembayaran = 'lunas';
        $pesanan->status_pesanan = 'diproses';

        $pesanan->save();

        return back()->with('success', 'Pembayaran berhasil dikonfirmasi');
    }

    public function proses($id)
{
    $pesanan = Pesanan::findOrFail($id);

    $pesanan->status_pesanan = 'diproses';
    $pesanan->save();

    return back();
}

public function kirim($id)
{
    $pesanan = Pesanan::findOrFail($id);

    $pesanan->status_pesanan = 'dikirim';
    $pesanan->save();

    return back();
}

public function selesai($id)
{
    $pesanan = Pesanan::findOrFail($id);

    $pesanan->status_pesanan = 'selesai';
    $pesanan->save();

    return back();
}
public function tolak($id)
{
    $pesanan = Pesanan::findOrFail($id);

    $pesanan->update([
        'status_pembayaran' => 'ditolak'
    ]);

    return redirect()->back()->with('success', 'Pembayaran berhasil ditolak');
}

public function pesanan()
{
    $pesanans = Pesanan::latest()->get();

    return view('admin.pesanan.index', compact('pesanans'));
}

public function updateStatus(Request $request, $id)
{
    $pesanan = Pesanan::findOrFail($id);

    $pesanan->update([
        'status_pesanan' => $request->status_pesanan
    ]);

    return back()->with('success', 'Status pesanan berhasil diupdate');
}
}