<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoriProduk;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:tb_kategori_produk,nama',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $kategori_produk = new KategoriProduk();
        $kategori_produk->nama = $request->nama;
        $kategori_produk->slug = Str::slug($request->nama, '-');
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(storage_path('app/public/image_kategori_produk/'), $filename);
            $kategori_produk->image = $filename;
        }

        $kategori_produk->save();
        return redirect()->route('kategori_produk.index')->with('status', 'Berhasil Menambahkan Kategori Produk Baru.');
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
    public function edit($id)
    {
        $kategori_produk = KategoriProduk::findOrFail($id);
        return view('admin.kategori_produk.edit',
            ['kategori_produk' => $kategori_produk]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:tb_kategori_produk,nama,' . $id,
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $kategori_produk = KategoriProduk::findOrFail($id);
        $kategori_produk->nama = $request->nama;
        $kategori_produk->slug = Str::slug($request->nama, '-');
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(storage_path('app/public/image_kategori_produk/'), $filename);
            $kategori_produk->image = $filename;
        }

        $kategori_produk->save();
        return redirect()->route('kategori_produk.index')->with('status', 'Berhasil Mengupdate Kategori Produk.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori_produk = KategoriProduk::findOrFail($id);
        if (file_exists(storage_path('app/public/image_kategori_produk/' . $kategori_produk->image))) {
            unlink(storage_path('app/public/image_kategori_produk/' . $kategori_produk->image));
        }
        $kategori_produk->delete();
        return redirect()->route('kategori_produk.index')->with('status', 'Berhasil Menghapus Kategori Produk.');
    }
}
