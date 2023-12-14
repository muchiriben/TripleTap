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
            'thumbnail' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
        ]);

        //handle if uploaded
        if ($request->hasFile('thumbnail')) {
            // Upload an thumbnail File to Cloudinary 
            $uploadedFileUrl = Cloudinary::upload($request->file('thumbnail')->getRealPath(), ['folder' => 'courses_thumbnails'])->getSecurePath();
            $imageId = Cloudinary::getPublicId();
        }

        $course = Course::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'thumbnail' => $uploadedFileUrl,
            'imageId' => $imageId,
        ]);


        return redirect()->route('admin.courses.create')->with('success', 'Course Created!!');
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
        return view('admin.courses.edit')->with('course' . $course);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $course_id)
    {
        $course = Course::findorfail($course_id);
        if ($request->hasFile('thumbnail')) {

            // Upload an thumbnail File to Cloudinary 
            $uploadedFileUrl = Cloudinary::upload($request->file('thumbnail')->getRealPath(), ['folder' => 'courses_thumbnails'])->getSecurePath();

            $imageId = Cloudinary::getPublicId();

            //update
            $course->thumbnail = $uploadedFileUrl;
            $course->imageId = $imageId;
            //delete previous
            Cloudinary::destroy($request->old_imageId);
        } else {
            $course->thumbnail = $request->old_image;
            $course->imageId = $request->old_imageId;
        }

        $course->name = $request->name;
        $course->price = $request->price;
        $course->description = $request->description;
        $course->save();

        return redirect()->route('admin.courses.index')->with('success', 'Course Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        if ($course->thumbnail != NULL) {
            //delete previous
            Cloudinary::destroy($course->imageId);
        }

        $course->delete();
        return redirect()->route('admin.courses.index')->with('error', 'Course Deleted!!');
    }
}
