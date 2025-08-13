<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JewelleryController extends Controller
{
    public function index()
    {
        return view('jewellery');
    }
}