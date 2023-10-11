<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProdukInOrder extends Model
{
    use HasFactory;
    protected $table = "tb_produk_in_order";
    protected $fillable = ['order_id', 'produk_id'];

    public function transaksi()
    {
        return $this->belongsTo(Order::class);
    }
}
