<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Picnic;

class PicnicController extends Controller
{
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'picnic_location' => 'required|string|max:255',
            'picnic_date' => 'required|date',
            'number_of_guests' => 'required|integer',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'service_type' => 'required|string',
            'comments' => 'nullable|string',
        ]);

        // Create a new picnic booking
        Picnic::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'picnic_location' => $request->picnic_location,
            'picnic_date' => $request->picnic_date,
            'number_of_guests' => $request->number_of_guests,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'service_type' => $request->service_type,
            'comments' => $request->comments,
        ]);

        return redirect()->back()->with('success', 'Your picnic booking has been successfully submitted!');
    }
}
