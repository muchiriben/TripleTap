<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Event;
use App\Models\CourseRegistration;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CourseandEventController extends Controller
{
    public function courses()
    {
        $courses = Course::all();
        return view('guest.courses.view')->with('courses', $courses);
    }

    public function courses_registration_individual($id)
    {
        $course = Course::findorfail($id);
        return view('guest.courses.register_individual')->with('course', $course);
    }

    public function courses_registration_group($id)
    {
        $course = Course::findorfail($id);
        return view('guest.courses.register_group')->with('course', $course);
    }

    public function courses_store_individual(Request $request)
    {
        $request->validate([
            'individual_name' => ['required', 'string', 'max:255'],
            'individual_age' => ['required', 'integer'],
            'individual_phone' => ['required', 'string'],
            'individual_national_id' => ['required', 'integer'],
            'individual_location' => ['required', 'string', 'max:255'],
            'individual_proffession' => ['required', 'string', 'max:255'],
            'agreement' => ['required', 'string'],
        ]);

        CourseRegistration::create([
            'course_id' => $request->course_id,
            'individual_name' => $request->individual_name,
            'individual_age' => $request->individual_age,
            'individual_phone' => $request->individual_phone,
            'individual_national_id' => $request->individual_national_id,
            'individual_location' => $request->individual_location,
            'individual_proffession' => $request->individual_proffession,
            'group_no' => 1,
            'agreement' => $request->agreement,
            'payment_status' => 'Pending',
        ]);

        $details = array(
            'detail' => "Individual Course Registration Made",
        );

        Mail::to('tripletaplimitedkenya@gmail.com')->send(new \App\Mail\RegistrationsMail($details));

        return redirect()->route('courses.confirm')->with('succcess', 'Registration Successfull');
    }

    public function courses_store_group(Request $request)
    {
        $request->validate([
            'leader_name' => ['required', 'string', 'max:255'],
            'leader_phone' => ['required', 'string'],
            'leader_national_id' => ['required', 'integer'],
            'leader_location' => ['required', 'string', 'max:255'],
            'group_relation' => ['required', 'string', 'max:255'],
            'group_no' => ['required', 'integer'],
            'from_age' => ['required', 'integer'],
            'to_age' => ['required', 'integer'],
            'agreement' => ['required', 'string'],
        ]);

        CourseRegistration::create([
            'course_id' => $request->course_id,
            'leader_name' => $request->leader_name,
            'leader_phone' => $request->leader_phone,
            'leader_national_id' => $request->leader_national_id,
            'leader_location' => $request->leader_location,
            'group_relation' => $request->group_relation,
            'from_age' => $request->from_age,
            'to_age' => $request->to_age,
            'group_no' => $request->group_no,
            'agreement' => $request->agreement,
            'payment_status' => 'Pending',
        ]);

        $details = array(
            'detail' => "Group Course Registration Made",
        );

        Mail::to('tripletaplimitedkenya@gmail.com')->send(new \App\Mail\RegistrationsMail($details));

        return redirect()->route('courses.confirm')->with('succcess', 'Registration Successfull!!');
    }

    public function events()
    {
        $events = Event::all();
        return view('guest.events.view')->with('events', $events);
    }

    public function events_registration_individual($id)
    {
        $event = Event::findorfail($id);
        return view('guest.events.register_individual')->with('event', $event);
    }

    public function events_registration_group($id)
    {
        $event = Event::findorfail($id);
        return view('guest.events.register_group')->with('event', $event);
    }

    public function events_store_individual(Request $request)
    {
        $request->validate([
            'individual_name' => ['required', 'string', 'max:255'],
            'individual_age' => ['required', 'integer'],
            'individual_phone' => ['required', 'string'],
            'individual_national_id' => ['required', 'integer'],
            'individual_location' => ['required', 'string', 'max:255'],
            'individual_proffession' => ['required', 'string', 'max:255'],
            'agreement' => ['required', 'string'],
        ]);

        EventRegistration::create([
            'event_id' => $request->event_id,
            'individual_name' => $request->individual_name,
            'individual_age' => $request->individual_age,
            'individual_phone' => $request->individual_phone,
            'individual_national_id' => $request->individual_national_id,
            'individual_location' => $request->individual_location,
            'individual_proffession' => $request->individual_proffession,
            'group_no' => 1,
            'agreement' => $request->agreement,
            'payment_status' => 'Pending',
        ]);

        $details = array(
            'detail' => "Individual Event Registration Made",
        );

        Mail::to('tripletaplimitedkenya@gmail.com')->send(new \App\Mail\RegistrationsMail($details));

        return redirect()->route('events.confirm')->with('succcess', 'Registration Successfull!!');
    }

    public function events_store_group(Request $request)
    {
        $request->validate([
            'leader_name' => ['required', 'string', 'max:255'],
            'leader_phone' => ['required', 'string'],
            'leader_national_id' => ['required', 'integer'],
            'leader_location' => ['required', 'string', 'max:255'],
            'group_relation' => ['required', 'string', 'max:255'],
            'group_no' => ['required', 'integer'],
            'from_age' => ['required', 'integer'],
            'to_age' => ['required', 'integer'],
            'agreement' => ['required', 'string'],
        ]);

        EventRegistration::create([
            'event_id' => $request->event_id,
            'leader_name' => $request->leader_name,
            'leader_phone' => $request->leader_phone,
            'leader_national_id' => $request->leader_national_id,
            'leader_location' => $request->leader_location,
            'group_relation' => $request->group_relation,
            'from_age' => $request->from_age,
            'to_age' => $request->to_age,
            'group_no' => $request->group_no,
            'agreement' => $request->agreement,
            'payment_status' => 'Pending',
        ]);

        $details = array(
            'detail' => "Group Event Registration Made",
        );

        Mail::to('tripletaplimitedkenya@gmail.com')->send(new \App\Mail\RegistrationsMail($details));

        return redirect()->route('events.confirm')->with('succcess', 'Registration Successfull!!');
    }

    public function course_registrations($course_id)
    {
        $registrations = CourseRegistration::where('course_id', $course_id)->get();
        $courses = Course::all();
        return view('admin.courses.registrations')->with([
            'registrations' => $registrations,
            'courses' => $courses,
        ]);
    }

    public function event_registrations($event_id)
    {
        $registrations = EventRegistration::where('event_id', $event_id)->get();
        $events = Event::all();
        return view('admin.events.registrations')->with([
            'registrations', $registrations,
            'events' => $events,
        ]);
    }
}
