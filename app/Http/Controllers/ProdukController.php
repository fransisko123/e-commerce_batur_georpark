<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_toko)
    {
        $toko = Toko::findOrFail($id_toko);
        return view('admin.toko.produk.index',
            ['toko' => $toko]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_toko)
    {
        $toko = Toko::findOrFail($id_toko);
        return view('admin.toko.produk.create',
            ['toko' => $toko]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id_toko)
    {
        // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:tb_toko',
            'deskripsi' => 'nullable',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $produk = new Produk();
        $produk->toko_id = $id_toko;
        $produk->nama = $request->nama;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(storage_path('app/public/image_produk'), $filename);
            $produk->image = $filename;
        }
        $produk->save();
        return redirect()->route('produk.index', $id_toko)->with('status', 'Berhasil Menambahkan Produk Baru.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
