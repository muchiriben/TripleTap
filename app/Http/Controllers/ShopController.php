<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShopController extends Controller
{
    public function shop()
    {
        $products = Product::all();
        $cart_products = Cart::content();

        return view('guest.shop.products')->with([
            'products' => $products,
            'cart_products' => $cart_products,
        ]);
    }

    public function search(Request $request)
    {
        $search_name = $request->search;
        $products = Product::where('name', 'LIKE', '%' . $search_name . '%')->get();
        //dd($products);
        $cart_products = Cart::content();

        return view('guest.shop.product-search')->with([
            'products' => $products,
            'cart_products' => $cart_products,
        ]);
    }
}
