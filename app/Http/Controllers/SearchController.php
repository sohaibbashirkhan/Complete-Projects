<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RentalSearch;

class SearchController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'city' => 'required|string|max:255',
            'car_type' => 'required|string|max:255',
        ]);

        // Store the search data
        RentalSearch::create([
            'city' => $request->city,
            'car_type' => $request->car_type,
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Search saved successfully!');
    }

    public function search(Request $request)
    {
        // Validate the request
        $request->validate([
            'city' => 'nullable|string|max:255',
            'car_type' => 'nullable|string|max:255',
        ]);

        // Perform the search
        $query = RentalSearch::query();

        if ($request->has('city') && !empty($request->city)) {
            $query->where('city', 'like', '%' . $request->city . '%');
        }

        if ($request->has('car_type') && !empty($request->car_type)) {
            $query->where('car_type', 'like', '%' . $request->car_type . '%');
        }

        $results = $query->get();

        // Return results to the view
        return view('search.results', ['results' => $results]);
    }
}
