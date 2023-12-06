<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Manufacturer;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Storage;
use App\Models\Course;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Order;
use App\Models\Message;


class DashboardController extends Controller
{

    public function dashboard()
    {
        if (Gate::allows('admin')) {
            $manufacturer_count = Manufacturer::all()->count();
            $category_count = Category::all()->count();
            $subcategory_count = SubCategory::all()->count();
            $storage_count = Storage::all()->count();
            $course_count = Course::all()->count();
            $event_count = Event::all()->count();
            $gallery_count = Gallery::all()->count();
            $order_count = Order::all()->count();
            $message_count = Message::all()->count();

            $products = Product::all();
            $product_count = 0;
            foreach ($products as $product) {
                $product_count = $product_count + $product->quantity;
            }

            return view('admin.dashboard')->with([
                'manufacturer_count' => $manufacturer_count,
                'category_count' => $category_count,
                'subcategory_count' => $subcategory_count,
                'storage_count' => $storage_count,
                'course_count' => $course_count,
                'event_count' => $event_count,
                'gallery_count' => $gallery_count,
                'product_count' => $product_count,
                'order_count' => $order_count,
                'message_count' => $message_count,
            ]);
        } elseif (Gate::allows('client')) {
            //
        }
    }
}
