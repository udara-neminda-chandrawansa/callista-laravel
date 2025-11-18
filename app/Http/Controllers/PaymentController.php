<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    // Server-to-server notification from PayHere
    public function notify(Request $request)
    {
        // Validate the payment (merchant_id, order_id, verify hash etc.)
        // Example: save to DB, mark order as paid
        Log::info('PayHere Notify', $request->all());

        return response()->json(['status' => 'success']);
    }

    public function return(Request $request)
    {
        return redirect()->route('pay')->with('success', 'Payment completed successfully!');
    }

    public function cancel()
    {
        return redirect()->route('pay')->with('error', 'Payment was cancelled.');
    }
}
