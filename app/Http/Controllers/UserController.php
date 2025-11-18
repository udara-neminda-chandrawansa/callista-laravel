<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $user = auth()->user();
        $userRole = $user->role;
        
        // You can add more user-specific data here
        $userData = [
            'user' => $user,
            'recentOrders' => [], // Placeholder for when you implement orders
            'favoriteItems' => [], // Placeholder for when you implement favorites
            'loyaltyPoints' => 2450, // Placeholder
        ];

        return view('public-site.dashboard', compact('userRole', 'userData'));
    }
}
