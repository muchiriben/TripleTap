<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{
    public function cart()
    {
        $products = Product::all();
        $cart_products = Cart::content();

        return view('guest.shop.cart')->with([
            'products' => $products,
            'cart_products' => $cart_products,
        ]);
    }


    public function addToCart(Request $request)
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if ($duplicates->isNotEmpty()) {
            return back()->with('success', 'Accessory is already in your cart!!');
        }

        Cart::add($request->id, $request->name, 1, $request->price)->associate(Product::class);

        return back()->with('success', 'Accessory added to cart!!');
    }

    public function updateCart(Request $request, $id)
    {
        Cart::update($id, ['qty' => $request->quantity]);
        return response()->json(['success' => true]);
    }

    public function removeCart($id)
    {
        Cart::remove($id);

        return redirect()->route('cart')->with('error', 'Accessory removed from cart!!');
    }

    public function clearAllCart()
    {
        Cart::destroy();

        return redirect()->route('cart')->with('error', 'Cart cleared!!');
    }
}
