<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\AlamatCustomer;
use Illuminate\Support\Facades\Validator;
use Kavist\RajaOngkir\RajaOngkir;

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
        $rajaOngkir = new RajaOngkir(env('RAJAONGKIR_API_KEY'));
        $daftarProvinsi = $rajaOngkir->provinsi()->all();
        $data_customer = Customer::findOrFail($customer);
        return view('admin.customer.alamat.create',
            [
                'data_customer' => $data_customer,
                'daftarProvinsi' => $daftarProvinsi
            ]
        );
    }

    public function getCities($provinceId)
    {
        // Ambil daftar kota berdasarkan province_id
        $rajaOngkir = new RajaOngkir(env('RAJAONGKIR_API_KEY'));
        $daftarKota = $rajaOngkir->kota()->dariProvinsi($provinceId)->get();

        return response()->json($daftarKota);
    }

    public function store(Request $request, $customer)
    {
        $validator = Validator::make($request->all(), [
            'provinsi' => 'required',
            'kota' => 'required',
            'alamat_spesifik' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $rajaOngkir = new RajaOngkir(env('RAJAONGKIR_API_KEY'));
        $provinsi = $rajaOngkir->provinsi()->find($request->provinsi);
        $kota = $rajaOngkir->kota()->find($request->kota);

        $alamat = new AlamatCustomer();
        $alamat->customer_id = $customer;
        $alamat->province_id = $provinsi['province_id'];
        $alamat->city_id = $kota['city_id'];
        $alamat->province = $provinsi['province'];
        $alamat->type = $kota['type'];
        $alamat->city_name = $kota['city_name'];
        $alamat->postal_code = $kota['postal_code'];
        $alamat->alamat_spesifik = $request->alamat_spesifik;

        $alamat->save();
        return redirect()->route('alamat_customer.index', $customer)->with('status', 'Berhasil Menambahkan Alamat Baru.');
    }

    public function destroy($alamat)
    {
        $data_alamat = AlamatCustomer::findOrFail($alamat);
        $data_alamat->delete();

        return redirect()->route('alamat_customer.index', $data_alamat->customer_id)->with('status', 'Berhasil menghapus alamat.');
    }
}
