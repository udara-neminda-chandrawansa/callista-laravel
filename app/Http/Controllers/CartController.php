<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function add(Request $request,)
    {
        Log::info('Add to cart called', $request->all());
        $product = Product::findOrFail($request->product_id);

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'quantity' => 1,
            'price' => $product->new_price,
            'weight' => 0,
            'options' => [
                'image' => $product->images->first()->image ?? 'default.jpg',
                'vendor' => $product->vendor,
                'stock_status' => $product->stock_status,
                'barcode' => $product->barcode,
                'color' => $product->color,
                'type' => $product->type
            ],
        ]);

        return response()->json(['message' => 'Product added to cart']);
    }
}
