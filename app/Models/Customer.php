<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Review;
use App\Models\AlamatCustomer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Customer extends Model implements Authenticatable
{
    use HasFactory, AuthenticableTrait;

    protected $fillable = ['nama', 'email', 'no_telp', 'password'];

    public function alamats()
    {
        return $this->hasMany(AlamatCustomer::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
