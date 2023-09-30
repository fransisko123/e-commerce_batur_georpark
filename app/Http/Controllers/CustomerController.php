<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customer.index',
            ['customers' => $customers]
        );
    }

    public function create()
    {
        return view('admin.customer.create',);
    }

    public function store(Request $request)
     {
        $validator = Validator::make($request->all(),[
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'tanggal_lahir' => 'required|date',
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:8|confirmed', // 'password_confirmation' field must match 'password'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $customer = new Customer();
            $customer->nama_depan = $request->nama_depan;
            $customer->nama_belakang = $request->nama_belakang;
            $customer->tanggal_lahir = $request->tanggal_lahir;
            $customer->email = $request->email;
            $customer->no_telp = $request->no_telp;
            $customer->password = Hash::make($request->password);
            // Add other customer fields here
            $customer->save();

            return redirect()->route('customer.index')->with('status', 'Berhasil Menambahkan Alamat Baru.');
    }

    public function edit($customer)
    {
        $data_customer = Customer::find($customer);
        return view('admin.customer.edit',
            ['data_customer' => $data_customer]
        );
    }
}
