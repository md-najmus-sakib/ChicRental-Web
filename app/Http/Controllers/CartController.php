<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart');
    }

    public function add(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'quantity' => 1
            ];
        }

        session(['cart' => $cart]);

        return back()->with('success', 'Item added to cart!');
    }
}