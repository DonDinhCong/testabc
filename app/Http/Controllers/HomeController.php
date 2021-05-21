<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('index', [
            'product_news' => Product::take(8)->orderByDesc('updated_at')->get(),
            'cates' => Category::where('cate_status', 1)->get(),
        ]);
    }
}
