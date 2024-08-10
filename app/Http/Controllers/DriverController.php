<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    // Function to display the list of drivers
    public function index()
    {
        $drivers = Driver::whereNull('deleted_at')->get();
        return view('dashboard.driver.index', compact('drivers'));
    }

    // Function to delete a driver (soft delete)
    public function delete($id)
    {
        $driver = Driver::findOrFail($id);
        $driver->delete();

        return redirect('dashboard/driver')->with('success', 'Driver deleted successfully!');
    }

    // Function to store a new driver
    public function store(Request $request)
    {
        $request->validate([
            'driver_name' => 'required',
            'cnic_back_side' => 'required',
            'cnic_front_side' => 'required',
            'driving_license' => 'required|unique:drivers',
            'vehicle_registration' => 'required',
            'vehicle_id' => 'required|unique:drivers',
            'phonenumber' => 'required',
            'photo' => 'nullable|image',
        ]);

        $photoPath = $request->file('photo') ? $request->file('photo')->store('photos', 'public') : null;

        Driver::create([
            'driver_name' => $request->driver_name,
            'cnic_back_side' => $request->cnic_back_side,
            'cnic_front_side' => $request->cnic_front_side,
            'photo' => $photoPath,
            'driving_license' => $request->driving_license,
            'vehicle_registration' => $request->vehicle_registration,
            'vehicle_id' => $request->vehicle_id,
            'phonenumber' => $request->phonenumber,
        ]);

        return redirect('/dashboard/driver')->with('success', 'Driver registered successfully!');
    }

    // Function to show the form for adding a driver
    public function add()
    {
        return view('dashboard.driver.add');
    }

    // Function to show the form for editing a driver
    public function edit($id)
    {
        $driver = Driver::findOrFail($id);
        return view('dashboard.driver.edit', compact('driver'));
    }

    // Function to update a driver
    public function update(Request $request, $id)
    {
        $request->validate([
            'driver_name' => 'required',
            'cnic_back_side' => 'required',
            'cnic_front_side' => 'required',
            'driving_license' => 'required|unique:drivers,driving_license,' . $id,
            'vehicle_registration' => 'required',
            'vehicle_id' => 'required|unique:drivers,vehicle_id,' . $id,
            'phonenumber' => 'required',
            'photo' => 'nullable|image',
        ]);

        $driver = Driver::findOrFail($id);

        $photoPath = $request->file('photo') ? $request->file('photo')->store('photos', 'public') : $driver->photo;

        $driver->update([
            'driver_name' => $request->driver_name,
            'cnic_back_side' => $request->cnic_back_side,
            'cnic_front_side' => $request->cnic_front_side,
            'photo' => $photoPath,
            'driving_license' => $request->driving_license,
            'vehicle_registration' => $request->vehicle_registration,
            'vehicle_id' => $request->vehicle_id,
            'phonenumber' => $request->phonenumber,
        ]);

        return redirect('/dashboard/driver')->with('success', 'Driver updated successfully!');
    }
}
