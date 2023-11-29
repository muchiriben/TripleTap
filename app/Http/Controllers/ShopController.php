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
        $products = Product::all();

        return view('guest.shop.shop')->with([
            'manufacturers' => $manufacturers,
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function subcategory($id)
    {
        $manufacturers = Manufacturer::all();
        $subcategories = SubCategory::where('category_id', $id)->get();
        $products = Product::all();

        return view('guest.shop.subcategories')->with([
            'manufacturers' => $manufacturers,
            'subcategories' => $subcategories,
            'products' => $products,
        ]);
    }

    public function accessories($id)
    {
        $manufacturers = Manufacturer::all();
        $products = Product::where('subcategory_id', $id)->get();

        return view('guest.shop.products')->with([
            'manufacturers' => $manufacturers,
            'products' => $products,
        ]);
    }

    public function accessoriesbymanufacturer($id)
    {
        $manufacturers = Manufacturer::all();
        $products = Product::where('manufacturer_id', $id)->get();

        return view('guest.shop.accessoriesbymanufacturer')->with([
            'manufacturers' => $manufacturers,
            'products' => $products,
        ]);
    }

    public function search(Request $request)
    {
        $manufacturers = Manufacturer::all();
        $search_name = $request->search;
        $products = Product::where('name', 'LIKE', '%' . $search_name . '%')->get();

        return view('guest.shop.product-search')->with([
            'products' => $products,
            'manufacturers' => $manufacturers,
        ]);
    }
}
