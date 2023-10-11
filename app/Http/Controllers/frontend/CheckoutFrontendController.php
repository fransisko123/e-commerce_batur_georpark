<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\ProdukInOrder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutFrontendController extends Controller
{
    public function cartToCheckout()
    {
        $user = auth()->guard('customer')->user();

        $cartItems = Cart::where('customer_id', $user->id)->get();

        if ($cartItems === null || $cartItems->count() < 1) {
            return redirect()->back();
        }

        $hargaTotal = 0;
        foreach ($cartItems as $item) {
            $hargaFinal = $item->produk->harga_diskon ? $item->produk->harga_diskon : $item->produk->harga;
            $hargaTotal += $hargaFinal * $item->quantity;
        }

        return view('frontend.checkout', [
            'user' => $user,
            'cartItems' => $cartItems,
            'hargaTotal' => $hargaTotal
        ]);
    }

    public function checkout_pay(Request $request)
    {
        $order = new Order();
        $order->customer_id = $request->user;
        $order->alamat = $request->alamat;
        $order->total_harga = $request->total_harga;
        $order->catatan = $request->catatan;
        $order->status = 'Pemesanan';
        $order->save();

        $cartItems = json_decode($request->input('cartItems'));

        foreach ($cartItems as $item) {
            $produk_in_order = new ProdukInOrder();
            $produk_in_order->order_id = $order->id;
            $produk_in_order->produk_id = $item->produk_id;
            $produk_in_order->quantity = $item->quantity;
            $produk_in_order->save();
        }

        foreach ($cartItems as $item) {
            $itemCart = Cart::find($item->id);
            $itemCart->delete();
        }
        // JavaScript untuk menampilkan pesan konfirmasi
        echo '<script type="text/javascript">
            alert("Pesanan Anda telah berhasil diproses!");
            window.location = "'.route('dashboard_frontend.index').'";
            </script>';
    }
}
