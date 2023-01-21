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

    function shop(Request $request) {

        $inputs = $request->all();
        
        $query = Product::query();
        
        if (isset($inputs['keyword'])) {
            $query = $query->where('name', 'like', '%'. $inputs['keyword'] .'%');
        }

        if (isset($inputs['category_id'])) {
            $query = $query->where('category_id', $inputs['category_id']);
        }

        if (isset($inputs['color'])) {
            if (!in_array('-1', $inputs['color'])) {
                $query = $query->whereIn('color_id', $inputs['color']);
            }
        }

        if (isset($inputs['size'])) {
            if (!in_array('-1', $inputs['size'])) {
                $query = $query->whereIn('size_id', $inputs['size']);
            }
        }

        if (isset($inputs['price'])) {
            if (!in_array('-1', $inputs['price'])) {
                $query = $query->where(function ($q) use ($inputs) {
                    foreach ($inputs['price'] as $price) {
                        $q = $q->orWhereBetween('price', [$price, $price + 100]);
                    }
                });
            }
        }


        $products = $query->paginate(Product::PAGINATION_COUNT);
        $sizes = Size::all();
        $colors = Color::all();
        return view('shop.shop', compact('products', 'sizes', 'colors'));
    }

    function shopDetail() {
        return view('shop.detail');
    }


    function addProductToCart(Request $request) {
        if ($request->has('id')) {
            $cartProducts = Session::get('cart', []);
            $currentProductId = (int) $request->get('id');
            if (!array_key_exists($currentProductId, $cartProducts)) {
                $cartProducts[$currentProductId] =  1;
            } else {
                $cartProducts[$currentProductId] += 1;
            }
            
            // $cartProducts ===> [id1 => quantity1, id2 => quantity2, ... ]
            
            Session::put('cart', $cartProducts);

            return response()->json(["url" => "/shop"]);
        }

        return abort(404);
    }

    function addProductToLikedList(Request $request) {
        if ($request->has('id')) {
            $ids = Session::get('ids', []);
            if (!in_array($request->get('id'), $ids)) {
                array_push($ids, $request->get('id'));
            }

            Session::put('ids', $ids);
            return response()->json(["url" => "/"]);
        }

        return abort(404);
    }
}
