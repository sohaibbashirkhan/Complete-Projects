<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function search(Request $request)
    {
        // Implement your search logic here
        // For example:
        $query = $request->input('query');
        $cars = Car::where('name', 'LIKE', "%{$query}%")->get();
        
        return view('cars.search', ['cars' => $cars]);
    }
}
