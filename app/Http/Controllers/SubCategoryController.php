<?php

namespace App\Http\Controllers;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = SubCategory::paginate(10);
        $categories = Category::all();

        return view('admin.subcategories.view')->with([
            'subcategories' => $subcategories,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')
            ->get();
        return view('admin.subcategories.create')->with([
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'integer'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
        ]);

        //handle if uploaded
        if ($request->hasFile('image')) {
            // Upload an Image File to Cloudinary 
            $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath(), ['folder' => 'subcategory_images'])->getSecurePath();
            $imageId = Cloudinary::getPublicId();
        }

        $subCategory = SubCategory::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'image' => $uploadedFileUrl,
            'imageId' => $imageId,
        ]);


        return redirect()->route('admin.subcategories.create')->with('success', 'New category added');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subcategory)
    {
        $category_id = $subcategory->category_id;
        $category = Category::findorfail($category_id);
        $categories = Category::all();
        return view('admin.subcategories.edit')
            ->with([
                'subcategory' => $subcategory,
                'category' => $category,
                'categories' => $categories,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $subcategory_id)
    {
        $subCategory = SubCategory::findorfail($subcategory_id);
        if ($request->hasFile('image')) {

            // Upload an Image File to Cloudinary 
            $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath(), ['folder' => 'subcategory_images'])->getSecurePath();

            $imageId = Cloudinary::getPublicId();

            //update
            $subCategory->image = $uploadedFileUrl;
            $subCategory->imageId = $imageId;
            //delete previous
            Cloudinary::destroy($request->old_imageId);
        } else {
            $subCategory->image = $request->old_image;
            $subCategory->imageId = $request->old_imageId;
        }

        $subCategory->name = $request->name;
        $subCategory->category_id = $request->category_id;
        $subCategory->save();

        return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subcategory)
    {
        if ($subcategory->image != NULL) {
            //delete previous
            Cloudinary::destroy($subcategory->imageId);
        }

        $subcategory->delete();
        return redirect()->route('admin.subcategories.index');
    }
}
