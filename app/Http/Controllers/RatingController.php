<?php

namespace App\Http\Controllers;

use App\Models\rating;
use App\Models\ride;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function create($rideId)
    {
        $ride = Ride::findOrFail($rideId);
        return view('ratings.create', compact('ride'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ride_id' => 'required|exists:rides,id',
            'rating' => 'required|integer|between:1,5',
            'review' => 'nullable|string'
        ]);

        Rating::create([
            'ride_id' => $request->ride_id,
            'customer_id' => auth()->id(), // Assuming the customer is authenticated
            'user_id' => Ride::find($request->ride_id)->user_id, // Get the driver ID
            'rating' => $request->rating,
            'review' => $request->review
        ]);

        return redirect()->back()->with('success', 'Rating submitted successfully!');
    }

    public function index()
    {
        $ratings = Rating::with('ride', 'customer', 'driver')->get();
        return view('ratings.index', compact('ratings'));
    }
}

