<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerFrontendController extends Controller
{
    public function myAccount()
    {
        return view('frontend.myaccount.index');
    }
}
