<?php

namespace App\Http\Controllers;

use App\Models\BusBooking;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'pickup_location' => 'required|string',
            'dropoff_location' => 'required|string',
            'pickup_date' => 'required|date',
            'dropoff_date' => 'required|date',
            'service_type' => 'required|string',
            'comments' => 'nullable|string',
        ]);

        BusBooking::create($request->all());

        return redirect()->back()->with('success', 'Booking successful!');
    }
}
