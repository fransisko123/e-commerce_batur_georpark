<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutFrontendController extends Controller
{
    public function cartToCheckout()
    {
        $cartItems = session('cartItems');
        $hargaTotal = session('hargaTotal');
        if ($cartItems === null || empty($cartItems)) {
            return redirect()->back();
        }

        $user = auth()->guard('customer')->user();

        return view('frontend.checkout', [
            'cartItems' => $cartItems,
            'hargaTotal' => $hargaTotal,
            'user' => $user
        ]);
    }
}
