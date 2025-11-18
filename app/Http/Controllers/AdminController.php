<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        // Ensure only admins can access
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Access denied. Admin privileges required.');
        }

        $userRole = auth()->user()->role;
        
        // You can add more admin-specific data here
        $adminData = [
            'totalUsers' => \App\Models\User::count(),
            'adminUsers' => \App\Models\User::where('role', 'admin')->count(),
            'regularUsers' => \App\Models\User::where('role', 'user')->count(),
            'recentUsers' => \App\Models\User::latest()->take(5)->get(),
        ];

        return view('admin-dashboard.home', compact('userRole', 'adminData'));
    }

    public function users()
    {
        // Ensure only admins can access
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Access denied. Admin privileges required.');
        }

        $users = \App\Models\User::all();
        return view('admin-dashboard.users', compact('users'));
    }

    public function products()
    {
        // Ensure only admins can access
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Access denied. Admin privileges required.');
        }

        $products = \App\Models\Product::all();
        return view('admin-dashboard.products', compact('products'));
    }

    public function orders()
    {
        // Ensure only admins can access
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Access denied. Admin privileges required.');
        }

        $orders = \App\Models\UserOrder::all();
        return view('admin-dashboard.orders', compact('orders'));
    }

    public function login()
    {
        return view('auth.login');
    }
}
