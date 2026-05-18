<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $dari = $request->dari;
        $sampai = $request->sampai;

        $query = Pesanan::with('customer');

        // FILTER TANGGAL
        if ($dari && $sampai) {

            $query->whereDate('created_at', '>=', $dari)
                  ->whereDate('created_at', '<=', $sampai);
        }

        // DATA LAPORAN
        $pesanans = $query->latest()->get();

        // TOTAL OMZET
        $totalOmzet = $pesanans->sum('total_harga');

        // OMZET HARI INI
        $omzetHariIni = Pesanan::whereDate('created_at', today())
                                ->sum('total_harga');

        // OMZET BULAN INI
        $omzetBulanIni = Pesanan::whereMonth('created_at', now()->month)
                                ->sum('total_harga');

        return view('admin.laporan.index', compact(
            'pesanans',
            'totalOmzet',
            'omzetHariIni',
            'omzetBulanIni',
            'dari',
            'sampai'
        ));
    }

    // EXPORT PDF
    public function exportPdf()
    {
        $pesanans = Pesanan::with('customer')
                            ->latest()
                            ->get();

        $pdf = Pdf::loadView('admin.laporan.pdf', compact('pesanans'));

        return $pdf->download('laporan-transaksi.pdf');
    }

    // INVOICE PDF
    public function invoicePdf($id)
    {
        $pesanan = Pesanan::with('customer')->findOrFail($id);

        $pdf = Pdf::loadView('admin.laporan.invoice-pdf', compact('pesanan'));

        return $pdf->stream('invoice-'.$pesanan->id.'.pdf');
    }
}