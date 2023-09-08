<?php

namespace App\Http\Controllers\frontend;

use App\Models\Toko;
use Illuminate\Http\Request;
use App\Models\KategoriProduk;
use App\Http\Controllers\Controller;

class DashboardFrontendController extends Controller
{
    public function index()
    {
        $kategori_produk = KategoriProduk::all();
        $toko = Toko::all();
        return view('frontend.dashboard',
            [
                'kategori_produk' => $kategori_produk,
                'toko' => $toko
            ]
        );
    }
}
