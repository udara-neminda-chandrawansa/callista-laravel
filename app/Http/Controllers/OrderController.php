<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserOrder;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function orders()
    {
        $orders = UserOrder::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('public-site.cus-dash', compact('orders'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'contact_info'  => 'required|string|max:255',
            'billing_data'       => 'required|array',
            'billing_data.first_name'   => 'required|string|max:255',
            'billing_data.last_name'    => 'required|string|max:255',
            'billing_data.company_name' => 'nullable|string|max:255',
            'billing_data.address_1'    => 'required|string|max:255',
            'billing_data.address_2'    => 'nullable|string|max:255',
            'billing_data.town'         => 'required|string|max:255',
            'billing_data.postal_code'  => 'required|string|max:20',
            'cart_data' => 'required|array',
            'order_notes'  => 'nullable|string',
            'payment_mode' => 'required|string|in:cash,card,bank',
            'payment_data' => 'nullable|array',
        ]);

        $order = UserOrder::create([
            'user_id'       => Auth::id(),
            'contact_info'  => $validated['contact_info'],
            'billing_data'  => $validated['billing_data'], // stored as JSON
            'order_notes'   => $validated['order_notes'] ?? null,
            'payment_mode'  => $validated['payment_mode'],
            'payment_data'  => $validated['payment_data'] ?? [],
            'cart_data'  => $validated['cart_data'],
            'status' => false,
        ]);

        return response()->json([
            'message' => 'Order created successfully.',
            'data'    => $order,
        ], 201);
    }

    public function toggleStatus(Request $request, $id)
    {
        $order = UserOrder::findOrFail($id);

        $validated = $request->validate([
            'status'  => 'required|boolean',
        ]);

        $order->update($validated);

        return response()->json([
            'message' => 'Order updated successfully.',
            'data'    => $order,
        ], 200);
    }
}
