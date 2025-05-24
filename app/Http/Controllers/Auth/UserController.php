<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    // Show edit profile form
    public function editProfile()
{
    $industries = ['IT', 'Finance', 'Healthcare', 'Education', 'Retail']; // Add your industries
    return view('profile.edit', [
        'user' => Auth::user(),
        'industries' => $industries
    ]);
}
public function viewProfile()
{
    $user = Auth::user();
    return view('profile.view', compact('user'));
}

    public function admineditProfile()
    {
        return view('admin.edit', ['user' => Auth::user()]);
    }

    public function adminupdateProfile(Request $request)
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

        return redirect()->route('edit.profile')->with('success', 'Profile updated successfully!');
    }

    // Update profile data
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
    
        // Common validation
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gender' => 'required|string|in:Male,Female,Other',
        ];
    
        // Add role-specific validation
        if ($user->hasRole('job_seeker')) {
            $rules['skills'] = 'required|string|max:255';
            $rules['desired_industry'] = 'nullable|string|max:255';
        } elseif ($user->hasRole('employer')) {
            $rules['company_name'] = 'nullable|string|max:255';
            $rules['company_industry'] = 'nullable|string|max:255';
            $rules['company_contact'] = 'nullable|string|max:255';
        }
    
        $request->validate($rules);
    
        // Update common fields
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
    
        // Role-specific field updates
        if ($user->hasRole('job_seeker')) {
            $user->skills = $request->skills;
            $user->desired_industry = $request->desired_industry;
        } elseif ($user->hasRole('employer')) {
            $user->company_name = $request->company_name;
            $user->company_industry = $request->company_industry;
            $user->company_contact = $request->company_contact;
        }
    
        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo && Storage::disk('public')->exists($user->profile_photo)) {
                Storage::disk('public')->delete($user->profile_photo);
            }
    
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $path;
        }
    
        $user->save();
    
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
    }
    
}
