<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $orders = Order::orderBy('no_order', 'desc');

        if ($start_date && $end_date) {
            $orders->whereBetween('created_at', [$start_date, date('Y-m-d', strtotime($end_date. ' + 1 day'))]);
        }

        $orders = $orders->get();
        return view('admin.order.index', ['orders' => $orders]);
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

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('order.index')->with('status', 'Berhasil Menghapus Order.');
    }
}
