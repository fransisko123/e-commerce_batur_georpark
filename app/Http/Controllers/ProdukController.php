<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\Produk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoriProduk;
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
        $kategori_produks = KategoriProduk::all();
        $toko = Toko::findOrFail($id_toko);
        return view('admin.toko.produk.create',
            [
                'toko' => $toko,
                'kategori_produks' => $kategori_produks
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id_toko)
    {
        // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:tb_produk,nama',
            'deskripsi' => 'nullable',
            'harga' => 'required|numeric',
            'harga_diskon' => 'nullable|numeric',
            'stok' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $produk = new Produk();
        $produk->toko_id = $id_toko;
        $produk->kategori_produk_id = $request->kategori_produk;
        $produk->nama = $request->nama;
        $produk->slug = Str::slug($request->nama, '-');
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->harga_diskon = $request->harga_diskon;
        $produk->stok = $request->stok;

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(storage_path('app/public/image_produk/'), $filename);
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
    public function edit($id)
    {
        $kategori_produks = KategoriProduk::all();
        $produk = Produk::findOrFail($id);
        return view('admin.toko.produk.edit',
            [
                'produk' => $produk,
                'kategori_produks' => $kategori_produks
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_toko, $id_produk)
    {
        // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:tb_produk,nama,' . $id_produk,
            'deskripsi' => 'nullable',
            'harga' => 'required|numeric',
            'harga_diskon' => 'nullable|numeric',
            'stok' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $produk = Produk::findOrFail($id_produk);

        $produk->kategori_produk_id = $request->kategori_produk;
        $produk->nama = $request->nama;
        $produk->slug = Str::slug($request->nama, '-');
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->harga_diskon = $request->harga_diskon;
        $produk->stok = $request->stok;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(storage_path('app/public/image_produk/'), $filename);

            // Hapus file gambar lama jika ada
            if ($produk->image) {
                unlink(storage_path('app/public/image_produk/' . $produk->image));
            }

            $produk->image = $filename;
        }

        $produk->save();
        return redirect()->route('produk.index', $id_toko)->with('status', 'Berhasil Mengupdate Produk.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        if (file_exists(storage_path('app/public/image_produk/' . $produk->image))) {
            unlink(storage_path('app/public/image_produk/' . $produk->image));
        }
        $produk->delete();
        return redirect()->route('produk.index', $produk->toko_id)->with('status', 'Berhasil Menghapus Produk.');
    }
}
