<?php

namespace App\Models;

use App\Models\ProdukInTransaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

    public function produkInTransaksi()
    {
        return $this->hasMany(ProdukInTransaksi::class);
    }
}
