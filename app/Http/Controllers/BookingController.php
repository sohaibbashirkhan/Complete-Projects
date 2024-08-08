<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'pickup_location' => 'required|string|max:255',
            'dropoff_location' => 'required|string|max:255',
            'pickup_date' => 'required|date',
            'pickup_time' => 'required|date_format:H:i',
        ]);

       Booking::create($request->all());

        return redirect()->back()->with('success', 'Booking successful!');
    }
}
