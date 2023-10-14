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
}
