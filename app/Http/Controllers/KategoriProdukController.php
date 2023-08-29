<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori_produk = KategoriProduk::all();
        return view('admin.kategori_produk.index',
            ['kategori_produk' => $kategori_produk]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori_produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriProduk $kategoriProduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriProduk $kategoriProduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriProduk $kategoriProduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriProduk $kategoriProduk)
    {
        //
    }
}
