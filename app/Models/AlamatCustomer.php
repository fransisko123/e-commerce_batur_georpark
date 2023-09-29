<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlamatCustomer extends Model
{
    use HasFactory;
    protected $table = "tb_alamat_customer";
    protected $fillable = ['alamat'];

    public function kategori_produk()
    {
        return $this->belongsTo(KategoriProduk::class);
    }
}
