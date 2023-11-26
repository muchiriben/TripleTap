<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Event;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function courses()
    {
        $courses = Course::all();
        return view('guest.courses.view')->with('courses', $courses);
    }

    public function events()
    {
        $events = Event::all();
        return view('guest.courses.view')->with('events', $events);
    }
}
