<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ManageAccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('driver')) {
            $profile = Driver::where('user_id', $user->id)->firstOrFail();
        } elseif ($user->hasRole('customer')) {
            $profile = Customer::where('user_id', $user->id)->firstOrFail();
        } else {
            abort(404, 'Profile not found');
        }

        return view('account.manage', compact('profile'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'email' => 'required_if:role,customer|email',
            'phone_number' => 'required_if:role,customer|numeric',
            'driver_name' => 'required_if:role,driver|string',
            'city' => 'required_if:role,driver|string',
            'driving_license' => 'required_if:role,driver|string',
            'vehicle_registration' => 'required_if:role,driver|string',
            'vehicle_id' => 'required_if:role,driver|string',
            'photo' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'nullable|confirmed|min:6'
        ]);

        if ($user->hasRole('driver')) {
            $profile = Driver::where('user_id', $user->id)->firstOrFail();
            $profile->update($request->except('photo', 'password'));

            if ($request->hasFile('photo')) {
                $profile->photo = $request->file('photo')->store('photos', 'public');
                $profile->save();
            }

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
                $user->save();
            }
        } elseif ($user->hasRole('customer')) {
            $profile = Customer::where('user_id', $user->id)->firstOrFail();
            $profile->update($request->only('email', 'phone_number'));

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
                $user->save();
            }
        }

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
