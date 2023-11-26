<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PemilikTokoController extends Controller
{
    public function index()
    {
        $pemilik_toko = User::where('role', 'pemilik_toko')->get();
        return view('admin.pemilik_toko.index',
            [
                'pemilik_toko' => $pemilik_toko
            ]
        );
    }

    public function create()
    {
        return view('admin.pemilik_toko.create');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validation = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Check if validation fails
        if (!$validation) {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        // If validation passes, proceed with creating the user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => 'pemilik_toko',
            'email_verified_at' => now(),
            'password' => bcrypt($request->input('password')),
        ]);

        // Additional actions can be performed here

        // Redirect to a success page or return a response
        return redirect()->route('pemilik_toko.index')->with('status', 'Berhasil membuat pemilik toko!');
    }

    public function edit($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Return the view with the user data
        return view('admin.pemilik_toko.edit',
            [
                'user' => $user
            ]
        );
    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Find the user by ID
        $user = User::findOrFail($id);

        // Update user data
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->filled('password') ? bcrypt($request->input('password')) : $user->password,
        ]);

        // Redirect to a success page or return a response
        return redirect()->route('pemilik_toko.index')->with('status', 'Berhasil mengupdate pemilik toko!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('pemilik_toko.index')->with('status', 'Berhasil menghapus pemilik toko!');
    }
}
