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
}
