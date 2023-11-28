<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $manufacturers = Manufacturer::all();

        return view('admin.manufacturers.view')->with('manufacturers', $manufacturers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.manufacturers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $manufacturer = Manufacturer::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.manufacturers.create')->with('success', 'New manufacturer added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Manufacturer $manufacturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manufacturer $manufacturer)
    {
        return view('admin.manufacturers.edit')
            ->with([
                'manufacturer' => $manufacturer,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Manufacturer $manufacturer)
    {
        $manufacturer->name = $request->name;
        $manufacturer->save();

        return redirect()->route('admin.manufacturers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manufacturer $manufacturer)
    {
        $manufacturer->delete();
        return redirect()->route('admin.manufacturers.index');
    }
}
