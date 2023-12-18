<?php

namespace App\Http\Controllers;

use App\Models\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StorageController extends Controller
{
    public function storage()
    {
        return view('guest.storage.storage');
    }

    public function storage_store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'serial_no' => ['required', 'string', 'max:255'],
            'fc_no' => ['required', 'string', 'max:255'],
            'item_type' => ['required', 'string', 'max:255'],
            'model' => ['required', 'string', 'max:255'],
            'duration' => ['required', 'string', 'max:255'],
            'expected_deposit_date' => ['required', 'date'],
        ]);

        Storage::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'serial_no' => $request->serial_no,
            'fc_no' => $request->fc_no,
            'item_type' => $request->item_type,
            'model' => $request->model,
            'duration' => $request->duration,
            'expected_deposit_date' => $request->expected_deposit_date,
        ]);

        $details = array(
            'name' => $request->name,
            'phone' => $request->phone,
            'serial_no' => $request->serial_no,
            'fc_no' => $request->fc_no,
            'item_type' => $request->item_type,
            'model' => $request->model,
            'duration' => $request->duration,
            'expected_deposit_date' => $request->expected_deposit_date,
        );

        Mail::to('tripletaplimitedkenya@gmail.com')->send(new \App\Mail\StorageMail($details));

        return redirect()->route('storage.confirm')->with('success', 'Storage application successful');
    }

    public function view()
    {
        $applications = Storage::orderBy('created_at', 'asc')->get();

        return view('admin.storage.view')->with('applications', $applications);
    }

    public function deposit($id)
    {
        $application = Storage::findorfail($id);

        return view('admin.storage.deposit')->with('application', $application);
    }

    public function collect($id)
    {
        $application = Storage::findorfail($id);

        return view('admin.storage.collection')->with('application', $application);
    }

    public function deposit_store(Request $request, $application_id)
    {
        $application = Storage::findorfail($application_id);

        $application->actual_deposit_date = $request->actual_deposit_date;
        $application->save();

        return redirect()->route('admin.storage.view')->with('success', 'Storage Record Updated');
    }

    public function collect_store(Request $request, $application_id)
    {
        $application = Storage::findorfail($application_id);

        $application->actual_collection_date = $request->actual_collection_date;
        $application->save();

        return redirect()->route('admin.storage.view')->with('success', 'Storage Record Updated');
    }
}
