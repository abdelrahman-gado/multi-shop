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


    function addProductToCart(Request $request) {
        if ($request->has('id')) {
            $cartProducts = Session::get('cart', []);
            $currentProductId = (int) $request->get('id');
            if (!array_key_exists($currentProductId, $cartProducts)) {
                $cartProducts[$currentProductId] =  1;
            } else {
                $cartProducts[$currentProductId] += 1;
            }

            $cartProductsCount = array_reduce($cartProducts, fn ($count, $value) => $count += $value, 0);
            Session::put('cart', $cartProducts);
            // $cartProducts ===> [id1 => quantity1, id2 => quantity2, ... ]

            return response()->json(["count" => $cartProductsCount]);
        }

        return abort(404);
    }

    function addProductToLikedList(Request $request) {
        if ($request->has('id')) {
            $ids = Session::get('ids', []);
            if (!in_array($request->get('id'), $ids)) {
                array_push($ids, $request->get('id'));
            }

            $likedListCount = count($ids);
            Session::put('ids', $ids);
            return response()->json(["count" => $likedListCount]);
        }

        return abort(404);
    }
}
