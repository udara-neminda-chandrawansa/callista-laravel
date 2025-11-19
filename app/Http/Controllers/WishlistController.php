<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\UserWishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class WishlistController extends Controller
{
    /**
     * Add product to wishlist
     */
    public function add(Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required|exists:product,id',
            ]);

            // For non-authenticated users, use session-based wishlist
            if (!Auth::check()) {
                $wishlist = session()->get('wishlist', []);
                
                if (!in_array($request->product_id, $wishlist)) {
                    $wishlist[] = $request->product_id;
                    session()->put('wishlist', $wishlist);
                    
                    return response()->json([
                        'success' => true,
                        'message' => 'Product added to wishlist',
                        'wishlist_count' => count($wishlist)
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Product already in wishlist'
                    ], 400);
                }
            }

            // For authenticated users, use database
            $userId = Auth::id();
            $productId = $request->product_id;

            // Check if product already in wishlist
            $existingWishlist = UserWishlist::where('user_id', $userId)
                ->where('product_id', $productId)
                ->first();

            if ($existingWishlist) {
                return response()->json([
                    'success' => false,
                    'message' => 'Product already in wishlist'
                ], 400);
            }

            // Add to wishlist
            UserWishlist::create([
                'user_id' => $userId,
                'product_id' => $productId,
            ]);

            $wishlistCount = UserWishlist::where('user_id', $userId)->count();

            return response()->json([
                'success' => true,
                'message' => 'Product added to wishlist successfully',
                'wishlist_count' => $wishlistCount
            ]);

        } catch (\Exception $e) {
            Log::error('Wishlist add error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove product from wishlist
     */
    public function remove(Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required',
            ]);

            // For non-authenticated users, use session-based wishlist
            if (!Auth::check()) {
                $wishlist = session()->get('wishlist', []);
                
                if (($key = array_search($request->product_id, $wishlist)) !== false) {
                    unset($wishlist[$key]);
                    $wishlist = array_values($wishlist); // Reindex array
                    session()->put('wishlist', $wishlist);
                }
                
                return response()->json([
                    'success' => true,
                    'message' => 'Product removed from wishlist',
                    'wishlist_count' => count($wishlist)
                ]);
            }

            // For authenticated users, use database
            $userId = Auth::id();
            $productId = $request->product_id;

            UserWishlist::where('user_id', $userId)
                ->where('product_id', $productId)
                ->delete();

            $wishlistCount = UserWishlist::where('user_id', $userId)->count();

            return response()->json([
                'success' => true,
                'message' => 'Product removed from wishlist',
                'wishlist_count' => $wishlistCount
            ]);

        } catch (\Exception $e) {
            Log::error('Wishlist remove error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get wishlist item count
     */
    public function getCount()
    {
        try {
            if (!Auth::check()) {
                $wishlist = session()->get('wishlist', []);
                return response()->json([
                    'success' => true,
                    'count' => count($wishlist)
                ]);
            }

            $count = UserWishlist::where('user_id', Auth::id())->count();

            return response()->json([
                'success' => true,
                'count' => $count
            ]);

        } catch (\Exception $e) {
            Log::error('Wishlist count error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'count' => 0
            ], 500);
        }
    }

    /**
     * Get wishlist total (items with details)
     */
    public function getTotal()
    {
        try {
            if (!Auth::check()) {
                $wishlistIds = session()->get('wishlist', []);
                $products = Product::with('images')->whereIn('id', $wishlistIds)->get();
                
                return response()->json([
                    'success' => true,
                    'total' => count($products),
                    'items' => $products
                ]);
            }

            $wishlistItems = UserWishlist::with(['product', 'product.images'])
                ->where('user_id', Auth::id())
                ->get();

            $products = $wishlistItems->map(function ($item) {
                return $item->product;
            });

            return response()->json([
                'success' => true,
                'total' => $wishlistItems->count(),
                'items' => $products
            ]);

        } catch (\Exception $e) {
            Log::error('Wishlist total error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'total' => 0,
                'items' => []
            ], 500);
        }
    }
}
