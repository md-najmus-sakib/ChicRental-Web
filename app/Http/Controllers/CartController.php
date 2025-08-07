<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function show()
    {
        $cart = CartItem::where('user_id', Auth::id())->get();
        return view('cart', compact('cart'));
    }

    public function index()
    {
        $cart = CartItem::where('user_id', Auth::id())->get();
        return view('cart', compact('cart'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
        ]);

        $item = CartItem::where('user_id', Auth::id())
            ->where('name', $request->name)
            ->first();

        if ($item) {
            $item->quantity += $request->quantity;
            $item->save();
        } else {
            CartItem::create([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'category' => $request->category,
                'image_url' => $request->image_url,
                'price' => $request->price,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }
    
    public function remove($id)
    {
        $cartItem = CartItem::where('id', $id)
                            ->where('user_id', Auth::id())
                            ->first();
        if ($cartItem) {
            $cartItem->delete();
        }
        return redirect()->back()->with('success', 'Item removed from cart.');
    }
}