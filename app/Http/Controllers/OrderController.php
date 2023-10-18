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

    public function create()
    {

    }
}
