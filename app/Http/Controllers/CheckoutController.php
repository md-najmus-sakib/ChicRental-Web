<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = auth()->user()->cart;  // Assuming you have a relationship to fetch cart items
        $totalAmount = $cartItems->sum('price'); // Calculate the total price
        return view('checkout', compact('cartItems', 'totalAmount'));
    }

    public function placeOrder(Request $request)
    {
        // Validate the user input
        $request->validate([
            'address' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'payment_method' => 'required|string',
        ]);

        // Store the order in the database, assuming you have a relation to the orders table
        $order = auth()->user()->orders()->create([
            'address' => $request->address,
            'phone' => $request->phone,
            'payment_method' => $request->payment_method,
            'total_amount' => $request->total_amount,
        ]);

        // Create order items (cart items)
        foreach ($request->cart_items as $cartItem) {
            $order->items()->create([
                'product_id' => $cartItem['id'],
                'quantity' => $cartItem['quantity'],
                'price' => $cartItem['price'],
            ]);
        }

        return redirect()->route('order.success'); // Redirect to order confirmation page
    }
}