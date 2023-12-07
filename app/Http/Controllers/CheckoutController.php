<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('guest.shop.checkout')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Cart::count() != 0) {
            $request->validate([
                'name' => ['required', 'string'],
                'phone' => ['required', 'string'],
                'location' => ['required', 'string'],
                'mpesa_code' => ['required', 'string'],
                'notes' => ['nullable', 'string'],
            ]);

            $order = Order::create([
                'name' => $request->name,
                'location' => $request->location,
                'phone' => $request->phone,
                'mpesa_code' => $request->mpesa_code,
                'notes' => $request->notes,
                'total' => Cart::subTotal(0, '', ''),
                'delivery_status' => 'Not Delivered',
            ]);

            // Insert into order_product table
            foreach (Cart::content() as $item) {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_name' => $item->model->name,
                    'product_id' => $item->model->id,
                    'quantity' => $item->qty,
                    'unit_price' => $item->model->selling_price,
                    'total_price' => $item->model->selling_price * $item->qty,
                ]);

                $product = Product::find($item->model->id);
                $product->quantity = $product->quantity - $item->qty;
                $product->save();
            }

            //destroy cart
            Cart::instance('default')->destroy();

            return redirect()->route('confirmation', ['id' => $order->id]);
        } else {
            return redirect()->route('shop')->with('error', 'You do not have any products in cart');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
