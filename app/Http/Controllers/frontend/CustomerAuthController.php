<?php

namespace App\Http\Controllers\frontend;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('frontend.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->intended('/');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function showRegistrationForm()
    {
        return view('frontend.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'tanggal_lahir' => 'required|date',
            'email' => 'required|email|unique:customers',
            'no_telp' => 'required',
            'password' => 'required|min:8|confirmed', // 'password_confirmation' field must match 'password'
        ]);

            $customer = new Customer();
            $customer->nama_depan = $request->nama_depan;
            $customer->nama_belakang = $request->nama_belakang;
            $customer->tanggal_lahir = $request->tanggal_lahir;
            $customer->email = $request->email;
            $customer->no_telp = $request->no_telp;
            $customer->password = Hash::make($request->password);
            // Add other customer fields here
            $customer->save();

            return redirect()->route('customer.login')->with('success', 'Registrasi Berhasil. Sekarang sudah bisa login.');
    }
}
