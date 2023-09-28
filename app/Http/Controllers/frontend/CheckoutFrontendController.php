<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutFrontendController extends Controller
{
    public function cartToCheckout()
    {
        $cartItems = session('cartItems');
        $hargaTotal = session('hargaTotal');
        if ($cartItems === null || empty($cartItems)) {
            return redirect()->back();
        }
        return view('frontend.checkout', [
            'cartItems' => $cartItems,
            'hargaTotal' => $hargaTotal,
        ]);
    }
}
