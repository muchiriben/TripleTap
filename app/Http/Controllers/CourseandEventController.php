<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Event;
use App\Models\CourseRegistration;
use App\Models\EventRegistration;
use Illuminate\Http\Request;

class CourseandEventController extends Controller
{
    public function courses()
    {
        $courses = Course::all();
        return view('guest.courses.view')->with('courses', $courses);
    }

    public function courses_registration($id)
    {
        $course = Course::findorfail($id);
        return view('guest.courses.register')->with('course', $course);
    }

    public function courses_store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'mpesa_code' => ['required', 'string', 'max:255'],
        ]);

        CourseRegistration::create([
            'course_id' => $request->course_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'mpesa_code' => $request->mpesa_code,
            'payment_status' => 'Pending Confirmation',
        ]);
        return redirect()->route('courses')->with('succcess', 'Registration Successfull');
    }

    public function events()
    {
        $events = Event::all();
        return view('guest.events.view')->with('events', $events);
    }

    public function events_registration($id)
    {
        $event = Event::findorfail($id);
        return view('guest.events.register')->with('event', $event);
    }

    public function events_store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'mpesa_code' => ['required', 'string', 'max:255'],
        ]);

        EventRegistration::create([
            'event_id' => $request->event_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'mpesa_code' => $request->mpesa_code,
            'payment_status' => 'Pending Confirmation',
        ]);
        return redirect()->route('events')->with('succcess', 'Registration Successfull');
    }
}
