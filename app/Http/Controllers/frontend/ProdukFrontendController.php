<?php

namespace App\Http\Controllers\frontend;

use App\Models\Produk;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdukFrontendController extends Controller
{
    public function detail($produk_slug)
    {
        $produk = Produk::where('slug', $produk_slug)->first();
        $reviews = Review::where('produk_id', $produk->id)->get();
        return view('frontend.produk_detail',
            [
                'produk' => $produk,
                'reviews' => $reviews
            ]
        );
    }
}
