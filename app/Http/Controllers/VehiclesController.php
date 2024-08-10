<?php

namespace App\Http\Controllers;

use App\Models\vehicle;
use Illuminate\Http\Request;

class VehiclesController extends Controller
{
    // Function to display the list of vehicles
    public function index()
    {
        $vehicles = vehicle::whereNull('deleted_at')->get();

        return view('dashboard.vehicles.index', compact('vehicles'));
    }

    // Function to delete a vehicle (soft delete)
    public function delete($id)
    {
        $vehicle = vehicle::findOrFail($id);
        $vehicle->delete();

        return redirect('dashboard/vehicles')->with('success', 'Vehicle deleted successfully!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'make' => 'required',
            'model' => 'required',
            'year_id' => 'required',
            'license_plate' => 'required|unique:vehicles',
            'color' => 'required',
            'type_id' => 'required',
            'photo_vehicle' => 'required|image',
            'vehicle_type_id' => 'nullable|exists:vehicle_types,id', // Ensure vehicle_type_id is valid
            'vehicle_model' => 'required|string',
        ]);
    
        $photoPath = $request->file('photo_vehicle')->store('photos', 'public');
    
        Vehicle::create([
            'user_id' => $request->user_id,
            'make' => $request->make,
            'model' => $request->model,
            'year_id' => $request->year_id,
            'license_plate' => $request->license_plate,
            'color' => $request->color,
            'type_id' => $request->type_id,
            'photo_vehicle' => $photoPath,
            'vehicle_type_id' => $request->vehicle_type_id,
            'vehicle_model' => $request->vehicle_model,
        ]);
    
        return redirect('/dashboard/vehicles')->with('success', 'Vehicle registered successfully!');
    }
    

    // Function to show the form for adding a vehicle
    public function add()
    {
        return view('dashboard.vehicles.add');
    }

    // Function to show the form for editing a vehicle
    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);

        return view('dashboard.vehicles.edit', compact('vehicle'));
    }
}
