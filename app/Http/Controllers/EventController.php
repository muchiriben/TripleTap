<?php

namespace App\Http\Controllers;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('admin.events.view')->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
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

        $event = Event::create([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'thumbnail' => $uploadedFileUrl,
            'imageId' => $imageId,
        ]);


        return redirect()->route('admin.events.create')->with('success', 'Event created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
