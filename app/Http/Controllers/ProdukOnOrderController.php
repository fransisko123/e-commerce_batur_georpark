<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Models\ProdukInOrder;

class ProdukOnOrderController extends Controller
{
    public function index($id, Request $request)
    {
        $toko = Toko::findOrFail($id);

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $produkInOrder = ProdukInOrder::whereHas('produk', function ($query) use ($toko) {
            $query->where('toko_id', $toko->id);
        })->whereHas('order', function ($query) {
            $query->where('status', 'Selesai');
        });;

        if ($start_date && $end_date) {
            $produkInOrder->whereBetween('created_at', [$start_date, date('Y-m-d', strtotime($end_date. ' + 1 day'))]);
        }

        $produkInOrder = $produkInOrder->get();

        return view('admin.produk_on_order.index', [
            'produkInOrder' => $produkInOrder,
            'toko' => $toko
        ]);
    }
}
