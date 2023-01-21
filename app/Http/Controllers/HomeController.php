<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    //
    function index()
    {   
        $products = Product::all();
        return view('shop.index', compact('products'));
    }

    function shopDetail() {
        return view('shop.detail');
    }

    
}
