<?php

namespace App\Models;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriProduk extends Model
{
    use HasFactory;
    protected $table = "tb_kategori_produk";
    protected $fillable = ['nama'];

    public function produks()
    {
        return $this->hasMany(Produk::class);
    }
}
