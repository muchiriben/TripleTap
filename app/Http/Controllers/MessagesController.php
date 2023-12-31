<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessagesController extends Controller
{
    public function messages()
    {
        $messages = Message::orderBy('created_at', 'asc')->paginate(10);

        return view('admin.messages.view')->with('messages', $messages);
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        Message::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        $details = array(
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        );

        Mail::to('tripletaplimitedkenya@gmail.com')->send(new \App\Mail\NotificationMail($details));

        return redirect('https://www.tripletaplimited.com/#contact-us')->with("success", "Message sent. We'll get back to you soon.");
    }

    public function destroy($id)
    {
        $message = Message::findorfail($id);

        $message->delete();
        return redirect()->route('admin.messages.view')->with('error', 'Message Deleted!!');
    }
}
