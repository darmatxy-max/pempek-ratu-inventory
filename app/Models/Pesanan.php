<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $fillable = [

    'customer_id',

    'jenis_pesanan',

    'tanggal_preorder',

    'total_harga',

    'status_pesanan',

    'status_pembayaran',

    'metode_pembayaran',

    'bukti_pembayaran',

    'alamat_pengiriman',

    'catatan',

    'kode_invoice',

];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class);
    }
    
}

