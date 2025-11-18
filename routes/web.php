<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('public-site.home');
})->name('home');

Route::get('/marketplace', function () {
    return view('public-site.marketplace');
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
});
