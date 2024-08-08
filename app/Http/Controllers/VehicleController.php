<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'driver_name' => 'required|string|max:255',
            'photo_driver' => 'required|image',
            'vehicle_type' => 'required|string',
            'vehicle_model' => 'required|string',
            'license_plate' => 'required|string',
        ]);

        $photoPath = $request->file('photo_driver')->store('photos', 'public');

        Vehicle::create([
            'driver_name' => $request->driver_name,
            'photo_driver' => $photoPath,
            'vehicle_type' => $request->vehicle_type,
            'vehicle_model' => $request->vehicle_model,
            'license_plate' => $request->license_plate,
        ]);

        return redirect()->back()->with('success', 'Vehicle registered successfully!');
    }
}
