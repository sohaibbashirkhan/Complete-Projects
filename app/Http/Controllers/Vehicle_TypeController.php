<?php

namespace App\Http\Controllers;

use App\Models\VehicleType;
use Illuminate\Http\Request;

class Vehicle_TypeController extends Controller
{
    // Function to display the list of vehicle types
    public function index()
    {
        $vehicleTypes = VehicleType::all();
        return view('dashboard.vehicle_type.index', compact('vehicleTypes'));
    }

    // Function to show the form for adding a vehicle type
    public function add()
    {
        return view('dashboard.vehicle_type.add');
    }

    // Function to store a new vehicle type
    public function store(Request $request)
    {
        $request->validate([
            'type_name' => 'required|unique:vehicle_types',
        ]);

        VehicleType::create([
            'type_name' => $request->type_name,
        ]);

        return redirect('/dashboard/vehicle_types')->with('success', 'Vehicle type added successfully!');
    }

    // Function to show the form for editing a vehicle type
    public function edit($id)
    {
        $vehicleType = VehicleType::findOrFail($id);
        return view('dashboard.vehicle_type.edit', compact('vehicleType'));
    }

    // Function to update a vehicle type
    public function update(Request $request, $id)
    {
        $request->validate([
            'type_name' => 'required|unique:vehicle_types,type_name,' . $id,
        ]);

        $vehicleType = VehicleType::findOrFail($id);
        $vehicleType->update([
            'type_name' => $request->type_name,
        ]);

        return redirect('/dashboard/vehicle_types')->with('success', 'Vehicle type updated successfully!');
    }

    // Function to delete a vehicle type
    public function delete($id)
    {
        $vehicleType = VehicleType::findOrFail($id);
        $vehicleType->delete();

        return redirect('/dashboard/vehicle_types')->with('success', 'Vehicle type deleted successfully!');
    }
}
