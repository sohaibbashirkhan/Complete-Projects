<?php

namespace App\Http\Controllers;

use App\Models\BusBooking;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BusController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'pickup_location' => 'required|string',
            'dropoff_location' => 'required|string',
            'pickup_date' => 'required|date_format:Y-m-d', // Ensure the format is YYYY-MM-DD
            'dropoff_date' => 'required|date_format:Y-m-d', // Ensure the format is YYYY-MM-DD
            'service_type' => 'required|string',
            'comments' => 'nullable|string',
        ]);

        // Convert dates to the format YYYY-MM-DD
        $pickupDate = Carbon::createFromFormat('Y-m-d', $request->pickup_date)->format('Y-m-d');
        $dropoffDate = Carbon::createFromFormat('Y-m-d', $request->dropoff_date)->format('Y-m-d');

        // Prepare data for storage
        $data = $request->all();
        $data['pickup_date'] = $pickupDate;
        $data['dropoff_date'] = $dropoffDate;

        // Create a new BusBooking record
        BusBooking::create($data);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Booking successful!');
    }
}
