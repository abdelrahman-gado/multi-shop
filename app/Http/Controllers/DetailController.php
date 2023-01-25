<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    function index(Request $request) {
        $id = $request->get('id');
        $product = Product::findOrFail($id);
        $products = Product::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('shop.detail', compact('product', 'sizes', 'colors', 'products'));
    }
}
