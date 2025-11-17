<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
