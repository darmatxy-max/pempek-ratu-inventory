<?php

namespace App\Http\Controllers\User;
use App\Models\Produk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
     public function index()
    {
        $produks = Produk::latest()->take(4)->get();

        return view('user.home.index', compact('produks'));
    }
}
