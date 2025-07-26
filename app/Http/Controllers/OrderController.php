<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function track(Request $request)
    {
        $order = null;
        if($request->order_id){
            $order = (object)[
                'id' => $request->order_id,
                'created_at' => now(),
                'total' => 2590,
                'status' => 'Shipped',
            ];
        }
        return view('track_order', compact('order'));
    }
}
