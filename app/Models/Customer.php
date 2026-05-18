<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pesanan;

class Customer extends Model
{
    protected $guarded = [];

    public function pesanans()
    {
        return $this->hasMany(Pesanan::class);
    }
}