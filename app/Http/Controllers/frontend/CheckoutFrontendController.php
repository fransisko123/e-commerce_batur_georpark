<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Produk;
use App\Models\Payment;
use App\Models\Customer;
use Xendit\Configuration;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProdukInOrder;
use Xendit\Invoice\InvoiceApi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutFrontendController extends Controller
{
    public function cartToCheckout()
    {
        $user = auth()->guard('customer')->user();

        $cartItems = Cart::where('customer_id', $user->id)->get();

        if ($cartItems === null || $cartItems->count() < 1) {
            return redirect()->back();
        }

        $hargaTotal = 0;
        foreach ($cartItems as $item) {
            $hargaFinal = $item->produk->harga_diskon ? $item->produk->harga_diskon : $item->produk->harga;
            $hargaTotal += $hargaFinal * $item->quantity;
        }

        return view('frontend.checkout', [
            'user' => $user,
            'cartItems' => $cartItems,
            'hargaTotal' => $hargaTotal
        ]);
    }

    public function checkout_pay(Request $request)
    {
        $latestOrder = Order::latest()->first();
        $order = new Order();
        if ($latestOrder) {
            $latestOrderNumber = $latestOrder->no_order;
            // Ambil angka dari nomor order terbaru
            $latestOrderNumber = (int)substr($latestOrderNumber, 6);
            // Tingkatkan angka tersebut
            $latestOrderNumber++;
            // Format nomor order baru
            $newOrderNumber = "ORDER-" . str_pad($latestOrderNumber, 5, "0", STR_PAD_LEFT);
        } else {
            // Jika ini adalah order pertama, gunakan nomor awal
            $newOrderNumber = "ORDER-00001";
        }
        $order->no_order = $newOrderNumber;
        $order->customer_id = $request->user;
        $order->alamat = $request->alamat;
        $order->total_harga = (float)$request->total_harga;
        $order->catatan = $request->catatan;
        $order->status = 'Pemesanan';
        $order->save();

        $cartItems = json_decode($request->input('cartItems'));

        foreach ($cartItems as $item) {
            $produk_in_order = new ProdukInOrder();
            $produk_in_order->order_id = $order->id;
            $produk_in_order->produk_id = $item->produk_id;
            $produk_in_order->quantity = $item->quantity;
            $produk_in_order->save();

            $produk = Produk::find($item->produk_id);
            $produk->stok = $produk->stok - $item->quantity;
            $produk->save();
        }

        foreach ($cartItems as $item) {
            $itemCart = Cart::find($item->id);
            $itemCart->delete();
        }

        // ================================== PAYMENT XENDIT ============================
        Configuration::setXenditKey(env("XENDIT_API_KEY"));
        $params = [
            'external_id' => $order->no_order . '-' . date('Y-m-d-H:i:s', strtotime($order->created_at)),
            'payer_email' => $order->customer->email,
            'description' => 'Transaksi pada ID Order : ' . $order->no_order,
            'amount' => $order->total_harga,
            'invoice_duration' => 3600,
            'success_redirect_url' => 'http://127.0.0.1:8000/payment_success',
        ];

        // $createInvoice = \Xendit\Invoice::create($params);
        $apiInstance = new InvoiceApi();
        $result = $apiInstance->createInvoice($params);

        // SAVE to Database

        $payment = new Payment();
        $payment->order_id = $order->id;
        $payment->status = 'pending';
        $payment->checkout_link = $result['invoice_url'];
        $payment->external_id = $params['external_id'];
        $payment->payment_xendit_id = $result['id'];
        $payment->save();
        // JavaScript untuk menampilkan pesan konfirmasi
        return redirect()->route('checkout.pembayaran_page', [$order->customer_id, $payment->id]);
    }

    public function pembayaran_page($customer_id, $payment_id)
    {
        $customer = Customer::findOrFail($customer_id);
        $payment = Payment::findOrFail($payment_id);
        return view('frontend.payment.pembayaran', [
            'payment' => $payment,
            'customer' => $customer,
        ]);
    }
}
