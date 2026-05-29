<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kemitraan;

class KemitraanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN KEMITRAAN USER
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        // HANYA TAMPILKAN MITRA YANG SUDAH DITERIMA
        $resellers = Kemitraan::where('status', 'Diterima')
            ->latest()
            ->get();

        return view('user.kemitraan.index', compact('resellers'));
    }

    /*
    |--------------------------------------------------------------------------
    | STORE PENDAFTARAN MITRA
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        // VALIDASI
        $request->validate([
            'nama'         => 'required|string|max:255',
            'no_hp'        => 'required|string|max:20',
            'alamat'       => 'required|string',
            'jenis_mitra'  => 'required|in:Hampers,Reseller,Catering',
        ]);

        // SIMPAN DATA
        Kemitraan::create([
            'nama'         => $request->nama,
            'no_hp'        => $request->no_hp,
            'alamat'       => $request->alamat,
            'jenis_mitra'  => $request->jenis_mitra,
            'status'       => 'Menunggu',
        ]);

        // REDIRECT
        return redirect('/kemitraan')
            ->with('success', 'Pendaftaran kemitraan berhasil dikirim');
    }
}