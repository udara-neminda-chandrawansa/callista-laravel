<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('images');

        // Search
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Price filter
        if ($request->filled('min_price')) {
            $query->where('new_price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('new_price', '<=', $request->max_price);
        }

        // Category/type filter
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Sort
        if ($request->sort_by == 'rating') {
            $query->orderByDesc('rating');
        } else {
            $query->orderByDesc('created_at'); // default
        }

        // Pagination
        $products = $query->paginate(12)->appends($request->query());

        // All types for category filter buttons
        $types = Product::select('type')->distinct()->pluck('type');

        return view('public-site.shop', compact('products', 'types'));
    }
}
