<?php

namespace App\Http\Controllers\frontend;

use App\Models\Toko;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Models\KategoriProduk;
use App\Http\Controllers\Controller;

class DashboardFrontendController extends Controller
{
    public function index()
    {
        $kategori_rekomendasi = KategoriProduk::where('kategori_rekomendasi', true)->get();
        $productRecommended = Produk::where('harga_diskon', '!=', null)->get();
        $kategori_produk = KategoriProduk::all();
        $toko = Toko::all();
        return view('frontend.dashboard',
            [
                'kategori_produk' => $kategori_produk,
                'toko' => $toko,
                'productRecommended' => $productRecommended,
                'kategori_rekomendasi' => $kategori_rekomendasi
            ]
        );
    }
}
