<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukInOrder;

class ProdukOnOrderController extends Controller
{
    public function index($id)
    {
        return view('admin.produk_on_order.index');
    }
}
