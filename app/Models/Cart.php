<?php

namespace App\Models;

use App\Models\Produk;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $table = "tb_cart";
    protected $fillable = ['customer_id', 'produk_id', 'quantity'];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
