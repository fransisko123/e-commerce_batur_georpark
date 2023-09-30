<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\AlamatCustomer;
use Illuminate\Support\Facades\Validator;

class AlamatCustomerController extends Controller
{
    public function index($customer)
    {
        $data_customer = Customer::findOrFail($customer);
        $alamat = $data_customer->alamats;
        return view('admin.customer.alamat.index',
            [
                'alamat' => $alamat,
                'data_customer' => $data_customer
            ]
        );
    }

    public function create($customer)
    {
        $data_customer = Customer::findOrFail($customer);
        return view('admin.customer.alamat.create',
            [
                'data_customer' => $data_customer
            ]
        );
    }

    public function store(Request $request, $customer)
    {
        $validator = Validator::make($request->all(), [
            'alamat' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $alamat = new AlamatCustomer();
        $alamat->customer_id = $customer;
        $alamat->alamat = $request->alamat;

        $alamat->save();
        return redirect()->route('alamat_customer.index', $customer)->with('status', 'Berhasil Menambahkan Alamat Baru.');
    }
}
