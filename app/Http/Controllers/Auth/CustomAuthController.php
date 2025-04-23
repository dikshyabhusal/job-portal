<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class CustomAuthController extends Controller
{
    public function showlogin(){
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
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
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);

    $plainPassword = $request->password;

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($plainPassword);

    $user->plain_password = $plainPassword;

    $user->save(); 
        

    return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }


}
