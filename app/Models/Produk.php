<?php

namespace App\Models;

use App\Models\Toko;
use App\Models\KategoriProduk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;
    protected $table = "tb_produk";
    protected $fillable = ['toko_id', 'kategori_produk_id', 'nama', 'deskripsi', 'harga', 'harga_diskon', 'stok', 'image'];

    public function toko()
    {
        return $this->belongsTo(Toko::class);
    }

    public function kategori_produk()
    {
        return $this->belongsTo(KategoriProduk::class);
    }
}
