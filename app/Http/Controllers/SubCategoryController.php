<?php

namespace App\Http\Controllers;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = SubCategory::all();

        return view('admin.subcategories.view')->with('subcategories', $subcategories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.subcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'integer'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:3048'],
        ]);

        $subCategory = SubCategory::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

        //handle if uploaded
        if ($request->hasFile('image')) {
            // Upload an Image File to Cloudinary 
            $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath(), ['folder' => 'subcategory_images'])->getSecurePath();

            //update
            $subCategory->update([
                'image' => $uploadedFileUrl,
            ]);
        }


        return redirect()->route('admin.subcategories.index')->with('success', 'New category added');
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
    public function edit(SubCategory $subCategory)
    {
        return view('admin.subcategories.edit')
            ->with([
                'SubCategory' => $subCategory,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        if ($request->hasFile('image')) {

            // Upload an Image File to Cloudinary 
            $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath(), ['folder' => 'subcategory_image'])->getSecurePath();

            //update
            $subCategory->image = $uploadedFileUrl;
        }

        $subCategory->name = $request->name;
        $subCategory->category_id = $request->category_id;
        $subCategory->save();

        return redirect()->route('admin.subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        if ($subCategory->imageID != NULL) {
            //delete previous
            Cloudinary::destroy($subCategory->imageID);
        }

        $subCategory->delete();
        return redirect()->route('admin.subcategories.index');
    }
}
