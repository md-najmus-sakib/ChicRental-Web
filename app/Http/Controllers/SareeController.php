<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SareeController extends Controller
{
    public function sarees(Request $request)
    {
        $demoSarees = collect([
            (object)[
                'id' => 1,
                'name' => 'Red Bridal Saree',
                'category' => 'Bridal',
                'rent_price' => 1800,
                'original_price' => 2500,
                'is_new' => true,
                'is_discount' => false,
                'image' => asset('assets/img/red_bridal.jpg'),
                'description' => 'Gorgeous red saree for special days.',
                'size' => 'Free Size',
                'in_wishlist' => false,
            ],
        ]);
        $sarees = new \Illuminate\Pagination\LengthAwarePaginator(
            $demoSarees->forPage($request->page ?? 1, 9),
            $demoSarees->count(), 9, $request->page ?? 1,
            ['path' => url('/sarees')]
        );
        return view('sarees', compact('sarees'));
    }
}