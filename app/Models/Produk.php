<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
   protected $fillable = [

    'nama_produk',
    'harga',
    'stok_ready',
    'stok_frozen',
    'jenis',
    'gambar',
    'deskripsi',
    'stok',
    'kategori',
    'status'

];

    public function detailPesanans()
    {
        return $this->hasMany(DetailPesanan::class);
    }
}