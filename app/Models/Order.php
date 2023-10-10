<?php

namespace App\Models;

use App\Models\ProdukInOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table = "tb_order";
    protected $fillable = ['customer_id', 'alamat', 'total_harga', 'catatan'];

    public function produkInTransaksi()
    {
        return $this->hasMany(ProdukInOrder::class);
    }
}
