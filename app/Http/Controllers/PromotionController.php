<?php

// app/Http/Controllers/PromotionController.php
namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all();
        return view('promotions.index', compact('promotions'));
    }

    public function apply(Request $request)
    {
        $request->validate([
            'promo_code' => 'required|string'
        ]);

        $promotion = Promotion::where('code', $request->promo_code)->first();

        if ($promotion) {
            return redirect()->route('promotions.index')->with('success', 'Promo code applied: ' . $promotion->description . ' - ' . $promotion->discount . '% off');
        } else {
            return redirect()->route('promotions.index')->withErrors('Invalid promo code. Please try again.');
        }
    }
}
