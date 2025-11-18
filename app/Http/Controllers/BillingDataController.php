<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserBillingData;

class BillingDataController extends Controller
{
    public function get($id){
        $billingData = UserBillingData::where('user_id', $id)->firstOrFail();

        return response()->json([
            'message' => 'Billing data retrieved successfully',
            'data' => $billingData,
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'address_1'    => 'required|string|max:255',
            'address_2'    => 'nullable|string|max:255',
            'town'         => 'required|string|max:255',
            'postal_code'  => 'required|string|max:20',
        ]);

        $billingData = UserBillingData::updateOrCreate(
            ['user_id' => $validated['user_id']],  // condition
            $validated                           // values to insert/update
        );

        return response()->json([
            'message' => $billingData->wasRecentlyCreated
                ? 'Billing data created successfully'
                : 'Billing data updated successfully',
            'data' => $billingData,
        ], $billingData->wasRecentlyCreated ? 201 : 200);
    }
}
