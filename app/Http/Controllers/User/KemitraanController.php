<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kemitraan;

class KemitraanController extends Controller
{
    public function index()
    {
        $resellers = Kemitraan::latest()->get();

        return view('user.kemitraan.index', compact('resellers'));
    }

    public function store(Request $request)
    {
        Kemitraan::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'jenis_mitra' => $request->jenis_mitra,
            'status' => 'Menunggu'
        ]);

        return redirect('/kemitraan')
        ->with('success', 'Pendaftaran berhasil dikirim');
    }
}