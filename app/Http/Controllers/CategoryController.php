<?php

namespace App\Http\Controllers;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.view')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'manufacturer_id' => ['required', 'integer'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:3048'],
        ]);

        $category = category::create([
            'name' => $request->name,
            'manufacturer_id' => $request->manufacturer_id,
        ]);

        //handle if uploaded
        if ($request->hasFile('image')) {
            // Upload an Image File to Cloudinary 
            $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath(), ['folder' => 'category_images'])->getSecurePath();

            //update
            $category->update([
                'image' => $uploadedFileUrl,
            ]);
        }


        return redirect()->route('categories.index')->with('success', 'New category added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit')
            ->with([
                'category' => $category,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        if ($request->hasFile('image')) {

            // Upload an Image File to Cloudinary 
            $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath(), ['folder' => 'category_images'])->getSecurePath();

            //update
            $category->image = $uploadedFileUrl;
        }

        $category->name = $request->name;
        $category->manufacturer_id = $request->manufacturer_id;
        $category->save();

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->imageID != NULL) {
            //delete previous
            Cloudinary::destroy($category->imageID);
        }

        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
