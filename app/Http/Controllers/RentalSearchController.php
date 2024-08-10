<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class RentalSearchController extends Controller
{
    public function store(Request $request)
    {
        // Validate the search input
        $request->validate([
            'city' => 'required|string|max:255',
            'car_type' => 'required|string|max:255',
        ]);

        // Perform the search query (example logic)
        $vehicles = Vehicle::where('city', $request->city)
            ->where('vehicle_type', 'LIKE', '%' . $request->car_type . '%')
            ->get();

        // Return the results to the view
        return view('search-results', compact('vehicles'));
    }
}
