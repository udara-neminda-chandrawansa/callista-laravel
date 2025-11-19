<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // // Display all products (paginated)
    // public function index()
    // {
    //     $products = Product::with('images')->orderBy('created_at', 'asc')->paginate(10);
    //     return view('admin-dashboard.products-manager', compact('products'));
    // }

    // // Store new product
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'old_price' => 'nullable|numeric',
    //         'new_price' => 'nullable|numeric',
    //         'rating' => 'nullable|numeric|min:1|max:5',
    //         'barcode' => 'nullable|string|max:255',
    //         'color' => 'nullable|string|max:255',
    //         'vendor' => 'nullable|string|max:255',
    //         'type' => 'nullable|string|max:255',
    //         'height' => 'nullable|numeric',
    //         'width' => 'nullable|numeric',
    //         'length' => 'nullable|numeric',
    //         'weight' => 'nullable|numeric',
    //         'stock_status' => 'nullable|string|max:255',
    //         'tags' => 'nullable|json',
    //         'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    //     ]);

    //     // 🧮 Calculate size = height * width * length
    //     $height = $request->input('height');
    //     $width  = $request->input('width');
    //     $length = $request->input('length');

    //     $validated['size'] = ($height && $width && $length)
    //         ? $height * $width * $length
    //         : null;

    //     // Remove height, width, length
    //     unset($validated['height'], $validated['width'], $validated['length']);

    //     $product = Product::create($validated);

    //     // Handle images
    //     if ($request->hasFile('images')) {
    //         foreach ($request->file('images') as $image) {
    //             $imgName = time() . '_' . uniqid() . '_' . $image->getClientOriginalName();
    //             $image->move(public_path('uploads/products/gallery'), $imgName);
    //             ProductImage::create([
    //                 'product_id' => $product->id,
    //                 'image' => $imgName
    //             ]);
    //         }
    //     }

    //     return response()->json(['message' => 'Product created successfully!']);
    // }

    // // Update product
    // public function update(Request $request, $id)
    // {
    //     $product = Product::findOrFail($id);

    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'old_price' => 'nullable|numeric',
    //         'new_price' => 'nullable|numeric',
    //         'rating' => 'nullable|numeric|min:1|max:5',
    //         'barcode' => 'nullable|string|max:255',
    //         'color' => 'nullable|string|max:255',
    //         'vendor' => 'nullable|string|max:255',
    //         'type' => 'nullable|string|max:255',
    //         'height' => 'nullable|numeric',
    //         'width' => 'nullable|numeric',
    //         'length' => 'nullable|numeric',
    //         'weight' => 'nullable|numeric',
    //         'stock_status' => 'nullable|string|max:255',
    //         'tags' => 'nullable|json',
    //         'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    //     ]);

    //     // 🧮 Calculate size if dimensions are provided
    //     $height = $request->input('height');
    //     $width  = $request->input('width');
    //     $length = $request->input('length');

    //     if ($height && $width && $length) {
    //         $validated['size'] = $height * $width * $length;
    //     }

    //     // Remove dimension fields if your DB doesn’t store them
    //     unset($validated['height'], $validated['width'], $validated['length']);

    //     $product->update($validated);

    //     // Handle new images
    //     if ($request->hasFile('images')) {
    //         foreach ($request->file('images') as $image) {
    //             $imgName = time() . '_' . uniqid() . '_' . $image->getClientOriginalName();
    //             $image->move(public_path('uploads/products/gallery'), $imgName);
    //             ProductImage::create([
    //                 'product_id' => $product->id,
    //                 'image' => $imgName
    //             ]);
    //         }
    //     }

    //     return response()->json(['message' => 'Product updated successfully!']);
    // }

    // // Delete product
    // public function destroy($id)
    // {
    //     $product = Product::findOrFail($id);

    //     // Delete images
    //     foreach ($product->images as $img) {
    //         $galleryPath = public_path('uploads/products/gallery/' . $img->image);
    //         if (file_exists($galleryPath)) unlink($galleryPath);
    //         $img->delete();
    //     }

    //     $product->delete();

    //     return response()->json(['message' => 'Product deleted successfully!']);
    // }

    // // delete prod img (not working)
    // public function deleteImage($id)
    // {
    //     $image = ProductImage::findOrFail($id);
    //     $imagePath = public_path('uploads/products/gallery/' . $image->image);

    //     if (file_exists($imagePath)) {
    //         unlink($imagePath);
    //         $message = "Deleted image: " . $imagePath;
    //     } else {
    //         $message = "Image not found: " . $imagePath;
    //     }

    //     $image->delete();

    //     return response()->json(['message' => $message]);
    // }

    // public function shop(Request $request)
    // {
    //     $query = Product::with('images');

    //     $vendors = Product::select('vendor')
    //         ->distinct()
    //         ->whereNotNull('vendor')
    //         ->pluck('vendor');

    //     $types = Product::select('type')
    //         ->distinct()
    //         ->whereNotNull('type')
    //         ->pluck('type');


    //     // filter by vendor
    //     if ($request->filled('vendor')) {
    //         $query->where('vendor', $request->vendor);
    //     }

    //     // filter by type
    //     if ($request->filled('type')) {
    //         $query->where('type', $request->type);
    //     }

    //     // Search
    //     if ($request->has('search')) {
    //         $query->where('name', 'like', '%' . $request->search . '%');
    //     }

    //     // Price Filter
    //     if ($request->filled('min_price')) {
    //         $query->where('new_price', '>=', $request->min_price);
    //     }
    //     if ($request->filled('max_price')) {
    //         $query->where('new_price', '<=', $request->max_price);
    //     }

    //     // Sorting
    //     if ($request->sort == 'rating') {
    //         $query->orderByDesc('rating');
    //     } elseif ($request->sort == 'latest') {
    //         $query->orderByDesc('created_at');
    //     }

    //     // Pagination
    //     $perPage = $request->input('per_page', 10); // Default to 10 if not set

    //     $products = $query->paginate($perPage);

    //     $products->appends($request->except('page'));

    //     // Unique types for category sidebar
    //     $types = Product::select('type')->distinct()->pluck('type');

    //     $cartItems = Cart::session('cart')->getContent();
    //     $wishlistItems = Cart::session('wishlist')->getContent();
    //     $popularProducts = Product::with('images')
    //         ->orderByDesc('rating')   // Sort by rating descending
    //         ->take(4)                 // Optional: limit to top 8
    //         ->get();

    //     $product = Product::firstOrFail(); // get first product from db

    //     $images = $product->images;
    //     $productName = $product->name;
    //     $productDescription = $product->description;
    //     $productNewPrice = $product->new_price;
    //     $productOldPrice = $product->old_price;

    //     return view('public-site.shop', compact('vendors', 'products', 'types', 'cartItems', 'wishlistItems', 'popularProducts', 'images', 'productName', 'productDescription', 'productNewPrice', 'productOldPrice'));
    // }

    // Get products for homepage and marketplace with filters
    public function getProducts(Request $request)
    {
        $query = Product::with('images');
        
        // Category filter
        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('type', $request->category);
        }
        
        // Search filter
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('type', 'LIKE', "%{$searchTerm}%")
                  ->orWhereJsonContains('tags', $searchTerm);
            });
        }
        
        // Price range filter
        if ($request->filled('price_min')) {
            $query->where('new_price', '>=', $request->price_min);
        }
        if ($request->filled('price_max')) {
            $query->where('new_price', '<=', $request->price_max);
        }
        
        // Rating filter
        if ($request->filled('rating') && $request->rating !== 'all') {
            $minRating = (int) str_replace('+', '', $request->rating);
            $query->where('rating', '>=', $minRating);
        }
        
        // Stock status filter
        if ($request->filled('in_stock') && $request->in_stock === 'true') {
            $query->where('stock_status', '!=', 'out_of_stock');
        }
        
        // On sale filter
        if ($request->filled('on_sale') && $request->on_sale === 'true') {
            $query->whereNotNull('old_price')->whereRaw('old_price > new_price');
        }
        
        // Customizable filter
        if ($request->filled('customizable') && $request->customizable === 'true') {
            $query->whereJsonContains('tags', 'customizable');
        }
        
        // Sorting
        switch ($request->input('sort', 'default')) {
            case 'price-low':
                $query->orderBy('new_price', 'asc');
                break;
            case 'price-high':
                $query->orderBy('new_price', 'desc');
                break;
            case 'rating':
                $query->orderBy('rating', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'popular':
                $query->orderBy('rating', 'desc')->orderBy('created_at', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }
        
        $products = $query->paginate(12);
        
        // Transform products for JSON response
        $transformedProducts = collect($products->items())->map(function($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'new_price' => $product->new_price,
                'old_price' => $product->old_price,
                'rating' => $product->rating,
                'type' => $product->type,
                'vendor' => $product->vendor,
                'barcode' => $product->barcode,
                'color' => $product->color,
                'stock_status' => $product->stock_status,
                'tags' => $product->tags,
                'created_at' => $product->created_at,
                'images' => $product->images->map(function($image) {
                    return [
                        'id' => $image->id,
                        'image' => $image->image,
                        'url' => asset($image->image),
                        'alt' => $image->product->name
                    ];
                })
            ];
        });
        
        return response()->json([
            'products' => $transformedProducts,
            'pagination' => [
                'current_page' => $products->currentPage(),
                'last_page' => $products->lastPage(),
                'per_page' => $products->perPage(),
                'total' => $products->total(),
            ]
        ]);
    }
    
    // Get single product for modal view
    public function getProduct($id)
    {
        $product = Product::with('images')->findOrFail($id);
        
        return response()->json([
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'new_price' => $product->new_price,
            'old_price' => $product->old_price,
            'rating' => $product->rating,
            'type' => $product->type,
            'vendor' => $product->vendor,
            'barcode' => $product->barcode,
            'color' => $product->color,
            'stock_status' => $product->stock_status,
            'tags' => $product->tags,
            'images' => $product->images->map(function($image) {
                return [
                    'id' => $image->id,
                    'url' => asset($image->image),
                    'alt' => $image->product->name
                ];
            })
        ]);
    }
    
    // Get categories for filters
    public function getCategories()
    {
        $categories = Product::select('type')
            ->whereNotNull('type')
            ->distinct()
            ->pluck('type')
            ->map(function($type) {
                return [
                    'value' => $type,
                    'label' => ucfirst(str_replace('-', ' ', $type)),
                    'count' => Product::where('type', $type)->count()
                ];
            });
            
        return response()->json($categories);
    }
}
