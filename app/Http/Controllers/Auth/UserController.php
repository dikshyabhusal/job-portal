<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // Show edit profile form
    public function editProfile()
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    // Update profile data
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            // Delete the old photo if exists
            if ($user->profile_photo && Storage::exists($user->profile_photo)) {
                Storage::delete($user->profile_photo);
            }

            // Store the new profile photo
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $path;
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
    }
}
