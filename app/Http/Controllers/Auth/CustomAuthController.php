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
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'gender' => 'required',
            'skills' => 'nullable|string',
            'desired_industry' => 'nullable|string',
            'role' => 'required|in:job_seeker,employer', // Ensure valid role selection
        ]);

        // Hash the password before saving it to the database
        $hashedPassword = Hash::make($request->password);

        // Create a new user instance
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $hashedPassword; // Save hashed password
        $user->plain_password = $request->password; // Optional: store plain password for later use (you can remove this if not needed)
        $user->gender = $request->gender;
        $user->skills = $request->skills;
        $user->desired_industry = $request->desired_industry;
        $user->assignRole($request->role);
        // Save the user to the database
        $user->save();
        // Redirect to login page with success message
        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }
}
