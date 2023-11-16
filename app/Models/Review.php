<?php

namespace App\Models;

use App\Models\Produk;
use App\Models\Review;
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

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
