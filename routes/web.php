<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LehengaController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view('/faq', 'faq')->name('faq');

Route::get('/cart', [CartController::class, 'index'])->name('cart');

require __DIR__.'/auth.php';

Route::get('/search', function (Illuminate\Http\Request $request) {
    $query = $request->q;
    return view('search', compact('query'));
})->name('search');

Route::get('/track-order', [OrderController::class, 'track'])->name('track_order');


use App\Http\Controllers\SareeController;
Route::get('/sarees', [SareeController::class, 'sarees'])->name('sarees');

use App\Http\Controllers\WishlistController;
Route::post('/wishlist/add/{id}', [WishlistController::class, 'add'])->name('wishlist.add');

Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

Route::post('/cart/rent-now/{id}', [CartController::class, 'rentNow'])->name('cart.rentNow');

Route::get('/lehenga', [LehengaController::class, 'index'])->name('lehenga');

Route::get('/men/suits', function () {
    return view('mensuits');
})->name('mensuits');

//Signup Routes
use App\Http\Controllers\AuthController;
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup.form');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');