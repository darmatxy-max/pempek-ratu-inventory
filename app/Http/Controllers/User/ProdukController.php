<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LIST PRODUK
    |--------------------------------------------------------------------------
    */
    public function index(Request $request)
    {
        $query = Produk::query();

        /*
        |--------------------------------------------------------------------------
        | SEARCH PRODUK
        |--------------------------------------------------------------------------
        */
        if ($request->search) {

            $query->where('nama_produk', 'like', '%' . $request->search . '%');
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER PRODUK AKTIF / TIDAK HABIS
        |--------------------------------------------------------------------------
        */
        $produks = $query
            ->where(function ($q) {

                $q->where('status', '!=', 'habis')
                  ->orWhereNull('status');

            })
            ->latest()
            ->get();

        return view('user.produk.index', compact('produks'));
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL PRODUK
    |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        $produk = Produk::findOrFail($id);

        return view('user.produk.show', compact('produk'));
    }
}