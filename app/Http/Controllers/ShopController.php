<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request){
        return view('shop', [
            'products' => Product::all(),
        ]);

    }
}
