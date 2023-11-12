<?php

namespace App\Models;

use App\Models\Payment;
use App\Models\Customer;
use App\Models\ProdukInOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table = "tb_order";
    protected $fillable = ['customer_id', 'alamat', 'total_harga', 'catatan'];

    public function produkInOrder()
    {
        return $this->hasMany(ProdukInOrder::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
