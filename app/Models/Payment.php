<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'checkout_link', 'external_id', 'status', 'payment_xendit_id'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
