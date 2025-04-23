<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class PasswordResetController extends Controller
{
    public function sendVerificationCode()
{
    $user = auth()->user();
    $code = rand(100000, 999999); // 6 digit code
    $user->verification_code = $code;
    $user->save(); // Observer triggers here
    return redirect()->route('user.enter-verification-code')->with('message', 'Verification code sent to your email.');
}

public function showVerificationForm()
{
    return view('auth.verify_token');
}


public function showResetForm()
{
    return view('auth.verify_token');
}
public function updatePassword(Request $request)
{
    $request->validate([
        'verification_code' => 'required',
        'password' => 'required|confirmed|min:6',
    ]);

    $user = auth()->user();

    if ($user->verification_code !== $request->verification_code) {
        return back()->withErrors(['verification_code' => 'Invalid verification code.']);
    }

    $user->password = Hash::make($request->password);
    $user->verification_code = null; // clear code
    $user->save();

    return redirect()->route('dashboard')->with('message', 'Password successfully updated.');
}

public function verifyCode(Request $request)
{
    $request->validate([
        'verification_code' => 'required'
    ]);

    $user = auth()->user();

    if ($user->verification_code === $request->verification_code) {
        return response()->json(['success' => true]);
    } else {
        return response()->json(['success' => false, 'message' => 'Invalid verification code.']);
    }
}



    // public function showTokenForm() {
    //     return view('auth.verify_token');
    // }
    
    // public function verifyToken(Request $request) {
    //     $request->validate(['token' => 'required']);
    //     if (auth()->user()->reset_token == $request->token) {
    //         return redirect('/reset-password');
    //     }
    //     return back()->with('error', 'Invalid token.');
    // }

    // public function showResetForm() {
    //     return view('auth.reset_password');
    // }
    
    // public function resetPassword(Request $request) {
    //     $request->validate([
    //         'password' => 'required|confirmed|min:8',
    //     ]);
    
    //     $user = auth()->user();
    //     $user->password = Hash::make($request->password);
    //     $user->reset_token = null;
    //     $user->save();
    
    //     return redirect('/dashboard')->with('success', 'Password reset successfully!');
    // }
    
    
}
