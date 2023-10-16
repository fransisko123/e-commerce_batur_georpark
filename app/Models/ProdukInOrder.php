<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProdukInOrder extends Model
{
    use HasFactory;
    protected $table = "tb_produk_in_order";
    protected $fillable = ['order_id', 'produk_id'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
