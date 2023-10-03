<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use Illuminate\Http\Request;
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
        dd($request->user);
    }
}
