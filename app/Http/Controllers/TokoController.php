<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $toko = Toko::all();
        }
        if (auth()->user()->role == 'pemilik_toko') {
            $toko = Toko::where('user_id', auth()->user()->id)->get();
        }
        return view('admin.toko.index',
            ['toko' => $toko]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'pemilik_toko')->get();
        return view('admin.toko.create',
            [
                'users' => $users
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:tb_toko',
            'deskripsi' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $toko = new Toko();
        $toko->user_id = $request->pemilik_toko;
        $toko->nama = $request->nama;
        $toko->slug = Str::slug($request->nama, '-');
        $toko->deskripsi = $request->deskripsi;

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(storage_path('app/public/image_toko/'), $filename);
            $toko->image = $filename;
        }
        $toko->save();
        return redirect()->route('toko.index')->with('status', 'Berhasil Menambahkan Toko Baru.');
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
    public function edit($id)
    {
        $users = User::where('role', 'pemilik_toko')->get();
        $toko = Toko::findOrFail($id);
        return view('admin.toko.edit',
            [
                'users' => $users,
                'toko' => $toko
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:tb_toko,nama,' . $id,
            'deskripsi' => 'nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $toko = Toko::findOrFail($id);

        $toko->user_id = $request->pemilik_toko;
        $toko->nama = $request->nama;
        $toko->deskripsi = $request->deskripsi;

        if ($request->file('image')) {

            if ($toko->image && file_exists(storage_path('app/public/image_toko/' . $toko->image))) {
                unlink(storage_path('app/public/image_toko/' . $toko->image));
            }

            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(storage_path('app/public/image_toko/'), $filename);
            $toko->image = $filename;
        }

        $toko->save();
        return redirect()->route('toko.index')->with('status', 'Berhasil Memperbarui Toko.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $toko = Toko::findOrFail($id);
        if (file_exists(storage_path('app/public/image_toko/' . $toko->image))) {
            unlink(storage_path('app/public/image_toko/' . $toko->image));
        }
        $toko->delete();
        return redirect()->route('toko.index')->with('status', 'Berhasil Menghapus Toko.');
    }
}
