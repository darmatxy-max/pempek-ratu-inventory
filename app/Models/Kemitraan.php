<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kemitraan extends Model
{
    protected $fillable = [
        'nama',
        'no_hp',
        'alamat',
        'jenis_mitra',
        'status'
    ];
}