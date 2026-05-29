<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kemitraan;

class KemitraanController extends Controller
{
    public function index()
    {
        $kemitraans = Kemitraan::latest()->get();

        return view('admin.kemitraan.index', compact('kemitraans'));
    }

    public function konfirmasi($id)
    {
        $mitra = Kemitraan::findOrFail($id);

        $mitra->status = 'Diterima';

        $mitra->save();

        return redirect('/admin/kemitraan')
            ->with('success', 'Mitra berhasil dikonfirmasi');
    }

    public function tolak($id)
    {
        $mitra = Kemitraan::findOrFail($id);

        $mitra->status = 'Ditolak';

        $mitra->save();

        return redirect('/admin/kemitraan')
            ->with('success', 'Pengajuan mitra ditolak');
    }
}