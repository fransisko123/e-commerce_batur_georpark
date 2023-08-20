<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $toko = Toko::all();
        return view('admin.toko.index',
            ['toko' => $toko]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.toko.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $toko = new Toko();

        $toko->nama = $request->nama;
        $toko->deskripsi = $request->deskripsi;

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(storage_path('storage/image_toko'), $filename);
            $toko->image = $filename;
        }
        $toko->save();
        return redirect()->route('toko.index')->with('status', 'Berhasil Menambahkan Slider.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Toko $toko)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Toko $toko)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Toko $toko)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Toko $toko)
    {
        //
    }
}
