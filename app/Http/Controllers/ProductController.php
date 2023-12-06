<?php

namespace App\Http\Controllers;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\Product;
use App\Models\Manufacturer;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.products.view')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $manufacturers = Manufacturer::orderBy('name', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();
        $subcategories = subcategory::orderBy('name', 'asc')->get();

        return view('admin.products.create')->with([
            'manufacturers' => $manufacturers,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'purchase_price' => ['required', 'integer'],
            'selling_price' => ['required', 'integer'],
            'quantity' => ['required', 'integer'],
            'description' => ['required', 'string'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:6048'],
        ]);

        //handle if uploaded
        if ($request->hasFile('image')) {
            // Upload an Image File to Cloudinary 
            $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath(), ['folder' => 'accessories_images'])->getSecurePath();
        }

        $product = Product::create([
            'name' => $request->name,
            'manufacturer_id' => $request->manufacturer_id,
            'subcategory_id' => $request->subcategory_id,
            'purchase_price' => $request->purchase_price,
            'selling_price' => $request->selling_price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'image' => $uploadedFileUrl,
        ]);


        return redirect()->route('admin.products.create')->with('success', 'New product added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {

        return view('admin.products.edit')
            ->with([
                'product' => $product,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //handle if uploaded
        if ($request->hasFile('image')) {

            // Upload an Image File to Cloudinary 
            $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath(), ['folder' => 'accessories_images'])->getSecurePath();

            //update
            $product->image = $uploadedFileUrl;
        }

        $product->name = $request->name;
        $product->purchase_price = $request->purchase_price;
        $product->selling_price = $request->selling_price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->imageID != NULL) {
            //delete previous
            Cloudinary::destroy($product->imageID);
        }

        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
