<?php

namespace App\Http\Controllers;

use Xendit\Configuration;
use Xendit\Invoice\InvoiceApi;
use App\Models\Payment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()  {
        Configuration::setXenditKey(env("XENDIT_API_KEY"));
    }

    public function index()
    {
        $payments = Payment::all();
        return view('admin.payment.index',
            [
                'payments' => $payments,
            ]
        );
    }

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return redirect()->route('payment.index')->with('status', 'Berhasil Menghapus Payment.');
    }

    // Ini Untuk Admin supaya settled

    public function settled_payment(Request $request, $xendit_invoice_id, $external_id)
    {
        $apiInstance = new InvoiceApi();
        $invoice_id = $xendit_invoice_id;
        $result = $apiInstance->getInvoiceById($invoice_id);

        $payment = Payment::where('external_id', $external_id)->firstOrFail();

        if ($payment->status == 'settled') {
            return redirect()->route('payment.index')->with('status', 'Payment sudah settled.');
        }

        $payment->status = strtolower($result['status']);
        $payment->save();

        return redirect()->route('payment.index')->with('status', 'Berhasil mengubah status payment.');
    }
}
