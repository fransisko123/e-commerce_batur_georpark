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
        $produk->increment('click_count');
        $reviews = Review::where('produk_id', $produk->id)->get();
        $related_produk = Produk::where('kategori_produk_id', $produk->kategori_produk_id)->where('stok', '>', 0)->where('id', '!=', $produk->id)->get();
        return view('frontend.produk_detail',
            [
                'produk' => $produk,
                'reviews' => $reviews,
                'related_produk' => $related_produk
            ]
        );
    }
}
