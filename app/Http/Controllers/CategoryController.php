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
        $categories = Category::paginate(10);

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
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
        ]);

        //handle if uploaded
        if ($request->hasFile('image')) {
            // Upload an Image File to Cloudinary 
            $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath(), ['folder' => 'category_images'])->getSecurePath();
            $imageId = Cloudinary::getPublicId();
        }

        $category = category::create([
            'name' => $request->name,
            'image' => $uploadedFileUrl,
            'imageId' => $imageId,
        ]);



        return redirect()->route('admin.categories.create')->with('success', 'New category added');
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
    public function update(Request $request, $category_id)
    {
        $category = Category::findorfail($category_id);
        if ($request->hasFile('image')) {

            // Upload an Image File to Cloudinary 
            $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath(), ['folder' => 'category_images'])->getSecurePath();

            $imageId = Cloudinary::getPublicId();

            //update
            $category->image = $uploadedFileUrl;
            $category->imageId = $imageId;
            //delete previous
            Cloudinary::destroy($request->old_imageId);
        } else {
            $category->image = $request->old_image;
            $category->imageId = $request->old_imageId;
        }

        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->image != NULL) {
            //delete previous
            Cloudinary::destroy($category->imageId);
        }

        $category->delete();
        return redirect()->route('admin.categories.index')->with('error', 'Category Deleted!!');
    }
}
