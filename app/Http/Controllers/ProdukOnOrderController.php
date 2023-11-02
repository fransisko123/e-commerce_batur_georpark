<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Models\ProdukInOrder;

class ProdukOnOrderController extends Controller
{
    public function index($id)
    {
        $toko = Toko::findOrFail($id);
        $produkInOrder = ProdukInOrder::whereHas('produk', function ($query) use ($toko) {
            $query->where('toko_id', $toko->id);
        })->get();

        return view('admin.produk_on_order.index', [
            'produkInOrder' => $produkInOrder,
        ]);
    }
}
