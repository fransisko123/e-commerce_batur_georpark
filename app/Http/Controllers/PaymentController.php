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

    public function create(Request $request)
    {
        $params = [
            'external_id' => (string) Str::uuid(),
            'payer_email' => $request->payer_email,
            'description' => $request->description,
            'amount' => $request->amount,
        ];

        // $createInvoice = \Xendit\Invoice::create($params);
        $apiInstance = new InvoiceApi();
        $result = $apiInstance->createInvoice($params);

        // SAVE to Database

        $payment = new Payment();
        $payment->status = 'pending';
        $payment->checkout_link = $result['invoice_url'];
        $payment->external_id = $params['external_id'];
        $payment->save();

        return response()->json(['data' => $result]);
    }

    public function webhook(Request $request)
    {
        $apiInstance = new InvoiceApi();
        $invoice_id = $request->id;
        $result = $apiInstance->getInvoiceById($invoice_id);

        $payment = Payment::where('external_id', $request->external_id)->firstOrFail();

        if ($payment->status == 'settled') {
            return response()->json(['data' =>'Payment has been already processed']);
        }

        $payment->status = strtolower($result['status']);
        $payment->save();

        return response()->json(['data' => "Success"]);
    }
}
