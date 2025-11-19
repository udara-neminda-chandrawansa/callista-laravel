<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/run-migrations', function () {
    try {
        Artisan::call('optimize:clear');
        Artisan::call('migrate', ['--force' => true]);
        Artisan::call('db:seed', ['--force' => true]);

        return response()->json([
            'status' => 'success',
            'message' => 'Migrations and seeders ran successfully.',
            'output' => Artisan::output()
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage()
        ], 500);
    }
});

Route::get('/', function () {
    $featuredProducts = App\Models\Product::with('images')
        ->where('stock_status', '!=', 'out_of_stock')
        ->orderBy('rating', 'desc')
        ->take(8)
        ->get();
        
    $categories = App\Models\Product::select('type')
        ->whereNotNull('type')
        ->distinct()
        ->pluck('type')
        ->take(6);
        
    return view('public-site.home', compact('featuredProducts', 'categories'));
})->name('home');

Route::get('/marketplace', function () {
    $products = App\Models\Product::with('images')
        ->where('stock_status', '!=', 'out_of_stock')
        ->orderBy('created_at', 'desc')
        ->paginate(12);
        
    $categories = App\Models\Product::select('type')
        ->whereNotNull('type')
        ->distinct()
        ->pluck('type');
        
    return view('public-site.marketplace', compact('products', 'categories'));
})->name('marketplace');


Route::get('/customize', function () {
    return view('public-site.customize');
})->name('customize');


Route::get('/interior-design', function () {
    return view('public-site.interior-design');
})->name('interior-design');


Route::get('/about', function () {
    return view('public-site.about');
})->name('about');

Route::get('/contact', function () {
    return view('public-site.contact');
})->name('contact');

Route::get('/cart', function () {
    return view('public-site.cart');
})->name('cart');

// Product API routes for AJAX
Route::get('/api/products', [ProductController::class, 'getProducts'])->name('api.products');
Route::get('/api/products/{id}', [ProductController::class, 'getProduct'])->name('api.product');
Route::get('/api/categories', [ProductController::class, 'getCategories'])->name('api.categories');

// Admin Login Route
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    // Main dashboard route - redirects based on role
    Route::get('/dashboard', function () {
        $user = auth()->user();
        
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    })->name('dashboard');
    
    // User Dashboard
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    
    // Admin Dashboard (with admin check)
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
    Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
    
    // Product CRUD routes
    Route::post('/admin/products', [AdminController::class, 'storeProduct'])->name('admin.products.store');
    Route::get('/admin/products/{product}/edit', [AdminController::class, 'editProduct'])->name('admin.products.edit');
    Route::put('/admin/products/{product}', [AdminController::class, 'updateProduct'])->name('admin.products.update');
    Route::delete('/admin/products/{product}', [AdminController::class, 'destroyProduct'])->name('admin.products.destroy');
});
