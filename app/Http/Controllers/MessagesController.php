<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function messages()
    {
        $messages = Message::orderBy('created_at', 'asc');

        return view('admin.messages.view');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $manufacturer = Message::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.manufacturers.create')->with('success', 'New manufacturer added');
    }
}
