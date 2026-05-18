<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Customer;
use App\Models\Kemitraan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduk = Produk::count();

        $totalPesanan = Pesanan::count();

        $totalCustomer = Customer::count();

        $totalMitra = Kemitraan::count();

        // TOTAL PENJUALAN BULAN INI (HANYA YANG LUNAS)
        $pendapatanBulanIni = Pesanan::where('status_pembayaran', 'lunas')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total_harga');

        // PESANAN MENUNGGU KONFIRMASI
        $pendingPesanan = Pesanan::where(
            'status_pesanan',
            'menunggu konfirmasi'
        )->count();

        // PESANAN TERBARU
        $pesananTerbaru = Pesanan::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalProduk',
            'totalPesanan',
            'totalCustomer',
            'totalMitra',
            'pendapatanBulanIni',
            'pendingPesanan',
            'pesananTerbaru'
        ));
    }
}