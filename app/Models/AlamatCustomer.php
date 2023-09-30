<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlamatCustomer extends Model
{
    use HasFactory;
    protected $table = "tb_alamat_customer";
    protected $fillable = ['alamat'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
