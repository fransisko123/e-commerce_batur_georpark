<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('no_order', 'desc')->get();
        return view('admin.order.index',
            ['orders' => $orders]
        );
    }

    public function detail($id)
    {
        $order = Order::findOrFail($id);
        $produk_in_order = $order->produkInOrder;
        return view('admin.order.detail',
            [
                'order' => $order,
                'produk_in_order' => $produk_in_order
            ]
        );
    }

    public function dikirim($id)
    {
        $order = Order::findOrFail($id);
        $order->status = "Sedang Di Kirim";
        $order->save();
        return redirect()->route('order.index')->with('status', 'Berhasil Mengirim Order.');
    }

    public function selesai($id)
    {
        $order = Order::findOrFail($id);
        $order->status = "Selesai";
        $order->save();
        return redirect()->route('order.index')->with('status', 'Order telah selesai.');
    }
}
