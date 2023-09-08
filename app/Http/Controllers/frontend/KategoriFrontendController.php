<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Models\KategoriProduk;
use App\Http\Controllers\Controller;

class KategoriFrontendController extends Controller
{
    public function shop($kategori_slug)
    {
        $kategori = KategoriProduk::where('slug', $kategori_slug)->first();
        return view('frontend.kategori.kategori_shop',
            [
                'kategori' => $kategori
            ]
        );
    }
}
