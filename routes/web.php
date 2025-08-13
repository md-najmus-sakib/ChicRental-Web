<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SareeController;
use App\Http\Controllers\LehengaController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WishlistController;


//      HOME PAGE
Route::get('/', function () {
    return view('home');
})->name('home');

Route::view('/faq', 'faq')->name('faq');

//    AUTH & PROFILE
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//   SIGNUP/LOGIN/LOGOUT
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup.form');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// If using Laravel Breeze/Fortify
require __DIR__.'/auth.php';


//   PRODUCT ROUTES
Route::get('/sarees', [SareeController::class, 'sarees'])->name('sarees');
Route::get('/lehenga', [LehengaController::class, 'index'])->name('lehenga');
Route::get('/jewellery', [App\Http\Controllers\JewelleryController::class, 'index'])->name('jewellery');
Route::get('/men/suits', fn() => view('mensuits'))->name('mensuits');


//   WISHLIST & CART
Route::post('/wishlist/add/{id}', [WishlistController::class, 'add'])->name('wishlist.add');
Route::post('/cart/rent-now/{id}', [CartController::class, 'rentNow'])->name('cart.rentNow');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::post('/cart/add/{id}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/coupon', [App\Http\Controllers\CartController::class, 'applyCoupon'])->name('cart.coupon');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::middleware('auth')->group(function() {
    Route::get('/cart', [CartController::class, 'show'])->name('cart');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
});
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');



//   CHECKOUT
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');



//   ORDER TRACKING
Route::get('/track-order', [OrderController::class, 'track'])->name('track_order');


//   SEARCH
Route::get('/search', function (Request $request) {
    $query = $request->q;
    return view('search', compact('query'));
})->name('search');



//   DASHBOARD
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



//   PROFILE ROUTES
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});