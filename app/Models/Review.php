<?php

namespace App\Models;

use App\Models\Produk;
use App\Models\Review;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;
    protected $table = "tb_review";

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
