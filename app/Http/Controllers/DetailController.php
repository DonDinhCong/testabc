<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index($id){
        $result = Product::find($id);
        return view('detail', [
            'product' => $result,
        ]);
    }
}
