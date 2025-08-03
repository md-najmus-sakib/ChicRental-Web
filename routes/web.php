<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// ====== AUTH CONTROLLERS ======
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

// ====== PRODUCT & ORDER CONTROLLERS ======
use App\Http\Controllers\SareeController;
use App\Http\Controllers\LehengaController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WishlistController;

// ========== BASIC STATIC ROUTES ==========
Route::get('/', function () {
    return view('home');
})->name('home');

Route::view('/faq', 'faq')->name('faq');

// ========== AUTH & PROFILE ==========
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ========== SIGNUP/LOGIN/LOGOUT ==========
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup.form');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');

// Login/Logout (custom, if not using Breeze/Fortify/Jetstream)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Default Laravel Auth routes (if using Breeze/Fortify)
require __DIR__.'/auth.php';

// ========== PRODUCT ROUTES ==========
Route::get('/sarees', [SareeController::class, 'sarees'])->name('sarees');
Route::get('/lehenga', [LehengaController::class, 'index'])->name('lehenga');
Route::get('/men/suits', fn() => view('mensuits'))->name('mensuits');

// ========== WISHLIST & CART ==========
Route::post('/wishlist/add/{id}', [WishlistController::class, 'add'])->name('wishlist.add');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/rent-now/{id}', [CartController::class, 'rentNow'])->name('cart.rentNow');

// ========== ORDER TRACKING ==========
Route::get('/track-order', [OrderController::class, 'track'])->name('track_order');

// ========== SEARCH ==========
Route::get('/search', function (Request $request) {
    $query = $request->q;
    return view('search', compact('query'));
})->name('search');

// ========== DASHBOARD ==========
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');
