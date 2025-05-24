<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class CustomAuthController extends Controller
{
    public function showlogin(){
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user(); // ✅ Authenticated user
    
            // Role-based redirection
            if ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            }
    
            // Default dashboard for job_seeker and employer
            return redirect()->route('dashboard');
        }
    
        return back()->with('error', 'Invalid credentials');
    }
    

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');

    }



    public function showregister(){
        return view('auth.register');
    }

    public function register(Request $request)
{
    // Base validation rules
    $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'gender' => 'required|string',
        'role' => 'required|in:job_seeker,employer',
    ];

    // Conditionally require skills & desired_industry if job_seeker
    if ($request->role === 'job_seeker') {
        $rules['skills'] = 'required|string';
        $rules['desired_industry'] = 'required|string';
    } else {
        $rules['company_name'] = 'required|string';
        $rules['company_industry'] = 'required|string';
        $rules['company_contact'] = 'required|string';
    }

    $request->validate($rules);

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->plain_password = $request->password; // optional
    $user->gender = $request->gender;
    $user->skills = $request->skills;
    $user->desired_industry = $request->desired_industry;

    // Save employer-only fields if applicable
    if ($request->role === 'employer') {
        $user->company_name = $request->company_name;
        $user->company_industry = $request->company_industry;
        $user->company_contact = $request->company_contact;
    }

    $user->save();
    $user->assignRole($request->role);

    return redirect()->route('login')->with('success', 'Registration successful! Please login.');
}

}
