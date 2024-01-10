<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $bestReviewProduct = Produk::select('tb_produk.*', DB::raw('AVG(tb_review.stars) as average_stars'))
        ->join('tb_review', 'tb_produk.id', '=', 'tb_review.produk_id')
        ->groupBy('tb_produk.id',
                               'tb_produk.toko_id',
                               'tb_produk.kategori_produk_id',
                               'tb_produk.nama', 'tb_produk.slug',
                               'tb_produk.deskripsi',
                               'tb_produk.harga',
                               'tb_produk.harga_diskon',
                               'tb_produk.stok',
                               'tb_produk.berat',
                               'tb_produk.image',
                               'tb_produk.created_at',
                               'tb_produk.updated_at',
                               'tb_produk.click_count'
                            )
        ->orderByDesc('average_stars')
        ->first();

        $worstReviewProduct = Produk::select('tb_produk.*', DB::raw('AVG(tb_review.stars) as average_stars'))
        ->join('tb_review', 'tb_produk.id', '=', 'tb_review.produk_id')
        ->groupBy(
            'tb_produk.id',
            'tb_produk.toko_id',
            'tb_produk.kategori_produk_id',
            'tb_produk.nama',
            'tb_produk.slug',
            'tb_produk.deskripsi',
            'tb_produk.harga',
            'tb_produk.harga_diskon',
            'tb_produk.stok',
            'tb_produk.berat',
            'tb_produk.image',
            'tb_produk.created_at',
            'tb_produk.updated_at',
            'tb_produk.click_count'
        )
        ->orderBy('average_stars')
        ->first();

        // $bestSellerProduct = x;
        $bestSellerProduct = Produk::select(
            'tb_produk.*',
            DB::raw('COUNT(tb_produk_in_order.produk_id) as order_count'),
            DB::raw('SUM(tb_produk_in_order.quantity) as total_quantity'),
            DB::raw('SUM(tb_produk.harga * tb_produk_in_order.quantity) as total_revenue')
        )
        ->leftJoin('tb_produk_in_order', 'tb_produk.id', '=', 'tb_produk_in_order.produk_id')
        ->leftJoin('tb_order', 'tb_produk_in_order.order_id', '=', 'tb_order.id')
        ->where('tb_order.status', '=', 'selesai')
        ->groupBy(
            'tb_produk.id',
            'tb_produk.toko_id',
            'tb_produk.kategori_produk_id',
            'tb_produk.nama',
            'tb_produk.slug',
            'tb_produk.deskripsi',
            'tb_produk.harga',
            'tb_produk.harga_diskon',
            'tb_produk.stok',
            'tb_produk.berat',
            'tb_produk.image',
            'tb_produk.created_at',
            'tb_produk.updated_at',
            'tb_produk.click_count'
        )
        ->orderByDesc('order_count')
        ->first();

        $mostClicksProduct = Produk::orderBy('click_count', 'desc')->first();

        return view('admin.dashboard',
            [
                'bestReviewProduct' => $bestReviewProduct,
                'worstReviewProduct' => $worstReviewProduct,
                'bestSellerProduct' => $bestSellerProduct,
                'mostClicksProduct' => $mostClicksProduct,
            ]
        );
    }
}
