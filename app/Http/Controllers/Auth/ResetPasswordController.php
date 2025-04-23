<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function showResetPasswordForm($token)
    {
        $email = request()->query('email');

        if (!$email) {
            return redirect()->route('forgot.password')->withErrors(['email' => 'Email is missing.']);
        }
        
        return view('password.reset-password', [
            'token' => $token,
            'email' => $email
        ]);
        
    }

    public function showResetForm(){
        return view('auth.reset-link');
    }
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:6',
            'token' => 'required',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password)
                ])->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', 'Your password has been reset!');
        }

        return back()->withErrors(['email' => 'The provided credentials are incorrect or token expired.']);
    }

}

