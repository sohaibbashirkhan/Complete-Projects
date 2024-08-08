<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RentalSearch;

class RentalSearchController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'city' => 'required|string|max:255',
            'car_type' => 'required|string|max:255',
        ]);

        RentalSearch::create([
            'city' => $request->city,
            'car_type' => $request->car_type,
        ]);

        return redirect()->back()->with('success', 'Search saved successfully!');
    }
}
