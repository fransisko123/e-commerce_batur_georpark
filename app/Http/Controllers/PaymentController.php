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

    public function webhook(Request $request)
    {
        Configuration::setXenditKey(env("XENDIT_API_KEY"));

        // $XENDIT_WEBHOOK_TOKEN = env("XENDIT_WEBHOOK_TOKEN");

        // $reqHeaders = getallheaders();
        // $xIncomingCallbackTokenHeader = isset($reqHeaders['x-callback-token']) ? $reqHeaders['x-callback-token'] : "";

        // if ($xIncomingCallbackTokenHeader === $XENDIT_WEBHOOK_TOKEN) {
            $apiInstance = new InvoiceApi();
            $invoiceId = $request->id;
            $invoice = $apiInstance->getInvoiceById($invoiceId);

            $payment = Payment::where('payment_xendit_id', $invoiceId)->first();

            // Cek apakah pembayaran sudah diproses
            if ($payment->status == 'settled') {
                return response()->json(['message' => 'Payment has been already processed']);
            }

        $payment->status = strtolower($invoice['status']);
        $payment->save();

            // Tambahkan log aktivitas
            // \Log::error('Webhook received for payment ID: ' . $payment->id);

            return response()->json(['message' => 'Success'], 200);
        // }
    }
}
