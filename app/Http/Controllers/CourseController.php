<?php

namespace App\Http\Controllers;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.view')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'numeric'],
            'description' => ['required', 'string'],
            'thumbnail' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:6048'],
        ]);

        //handle if uploaded
        if ($request->hasFile('thumbnail')) {
            // Upload an thumbnail File to Cloudinary 
            $uploadedFileUrl = Cloudinary::upload($request->file('thumbnail')->getRealPath(), ['folder' => 'courses_thumbnails'])->getSecurePath();
        }

        $course = Course::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'thumbnail' => $uploadedFileUrl,
        ]);


        return redirect()->route('admin.courses.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
