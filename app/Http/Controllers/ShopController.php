<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Manufacturer;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShopController extends Controller
{
    public function shop()
    {
        $manufacturers = Manufacturer::all();
        $categories = Category::all();

        return view('guest.shop.shop')->with([
            'manufacturers' => $manufacturers,
            'categories' => $categories,
        ]);
    }

    public function subcategory($id)
    {
        $manufacturers = Manufacturer::all();
        $subcategories = SubCategory::where('category_id', $id)->get();

        return view('guest.shop.subcategories')->with([
            'manufacturers' => $manufacturers,
            'subcategories' => $subcategories,
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
