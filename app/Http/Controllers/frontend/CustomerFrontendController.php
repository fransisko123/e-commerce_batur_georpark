<?php

namespace App\Http\Controllers\frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerFrontendController extends Controller
{
    public function myAccount()
    {
        $customer = Auth::guard('customer')->user();
        $order = Order::where('customer_id', $customer->id)->get();
        return view('frontend.myaccount.index',
            [
                'order' => $order,
            ]
        );
    }

    public function detail_order($customer_id, $order_id)
    {
        $customer = Auth::guard('customer')->user();
        if ($customer->id != $customer_id) {
            abort(404);
        }
        $order = Order::findOrFail($order_id);
        $produk_in_order = $order->produkInOrder;
        return view('frontend.myaccount.detail_order',
            [
                'order' => $order,
                'produk_in_order' => $produk_in_order
            ]
        );
    }

    public function dibatalkan($id)
    {
        $order = Order::findOrFail($id);
        $order->status = "Dibatalkan";
        $order->save();
        return redirect()->route('customer.detail_order', [$order->customer_id, $order->id])->with('status', 'Order telah selesai.');
    }
}
