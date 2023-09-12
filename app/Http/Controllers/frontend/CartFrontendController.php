<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartFrontendController extends Controller
{
    public function addToCart(Produk $produk)
    {
        $cart = session()->get('cart', []);

        // Tambahkan produk ke dalam keranjang
        $cart[] = [
            'product_id' => $produk->id,
            'name' => $produk->nama,
            'price' => $produk->harga,
            // tambahkan informasi lain yang diperlukan
        ];

        // Simpan keranjang belanja kembali ke dalam sesi
        session()->put('cart', $cart);

        return redirect()->route('cart.show')->with('success', 'Produk telah ditambahkan ke keranjang belanja.');
    }
}
