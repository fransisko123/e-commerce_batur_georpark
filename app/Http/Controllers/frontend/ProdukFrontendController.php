<?php

namespace App\Http\Controllers\frontend;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdukFrontendController extends Controller
{
    public function detail($produk_slug)
    {
        $produk = Produk::where('slug', $produk_slug)->first();
        return view('frontend.produk_detail',
            [
                'produk' => $produk
            ]
        );
    }
}
