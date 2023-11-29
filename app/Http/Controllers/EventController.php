<?php

namespace App\Http\Controllers;

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
            'thumbnail' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:6048'],
        ]);

        //handle if uploaded
        //get filename with extension
        $fileNameWithExt = $request->file('thumbnail')->getClientOriginalName();
        //get just filename
        $filename  = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //get just ext
        $extension = $request->file('thumbnail')->getClientOriginalExtension();
        //filename to store
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        // upload image
        $path = $request->file('thumbnail')->storeAs('public/events/thumbnails', $fileNameToStore);

        $event = Event::create([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'thumbnail' => $fileNameToStore,
        ]);


        return redirect()->route('admin.events.index');
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
