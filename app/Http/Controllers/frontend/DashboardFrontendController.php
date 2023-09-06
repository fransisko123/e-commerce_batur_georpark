<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class DashboardFrontendController extends Controller
{
    public function index()
    {
        $kategori_produk = KategoriProduk::all();
        return view('frontend.dashboard',
            [
                'kategori_produk' => $kategori_produk
            ]
        );
    }
}
