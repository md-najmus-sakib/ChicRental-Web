<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = session()->get('wishlist', []);
        return view('wishlist', compact('wishlist'));
    }

    public function add(Request $request, $id)
    {
        $wishlist = session()->get('wishlist', []);

        if (!in_array($id, $wishlist)) {
            $wishlist[] = $id;
            session(['wishlist' => $wishlist]);
        }

        return back()->with('success', 'Item added to your wishlist!');
    }

    public function remove(Request $request, $id)
    {
        $wishlist = session()->get('wishlist', []);

        if (($key = array_search($id, $wishlist)) !== false) {
            unset($wishlist[$key]);
            session(['wishlist' => array_values($wishlist)]);
        }

        return back()->with('success', 'Item removed from your wishlist.');
    }

    public function clear()
    {
        session()->forget('wishlist');
        return back()->with('success', 'Wishlist cleared.');
    }
}