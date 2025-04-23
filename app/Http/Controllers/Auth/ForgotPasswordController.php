<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Mail\ResetTokenMail;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    // Show the Forgot Password form
    public function showForgotPasswordForm()
    {
        return view('password.forgot-password');
    }

    // Handle the sending of the password reset link using Laravel's built-in methods
    public function sendResetLink(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
        ]);

        // Send the reset link to the user's email using Laravel's built-in Password::sendResetLink
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Check if the reset link was successfully sent
        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', 'We have emailed your password reset token!');
        }

        return back()->withErrors(['email' => 'The email could not be found or is invalid.']);
    }

    // Show the token verification form
    public function showTokenForm(Request $request)
    {
        $email = $request->query('email');
        return view('password.verify-token', compact('email'));
    }

    // Handle sending the reset token (using Laravel's token generation)
    public function sendResetToken(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'No user found with this email address.']);
        }

        // Use Laravel's token creator
        $token = Password::createToken($user);

        // Send token via email (you can customize the ResetTokenMail as needed)
        Mail::to($request->email)->send(new ResetTokenMail($token));

        return redirect()->route('verify.token.form', ['email' => $request->email])->with('status', 'Reset token sent to your email.');
    }

    // Verify the token and email before allowing password reset
    public function verifyToken(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email'
        ]);

        // Redirect to the password reset form with the token and email in URL
        return redirect()->route('password.reset', ['token' => $request->token, 'email' => $request->email]);
    }

    // Handle the password reset process
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:6',
            'token' => 'required',
        ]);

        // Use Laravel's built-in reset method
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password)
                ])->save();
            }
        );

        // Check if the password reset was successful
        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', 'Your password has been reset!');
        }

        return back()->withErrors(['email' => 'The provided credentials are incorrect or token expired.']);
    }

    // Handle sending the reset token again if necessary
    public function sendResetTokenAgain(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();

        $token = Password::createToken($user);

        // Send token via email again
        Mail::to($request->email)->send(new ResetTokenMail($token));

        return redirect()->route('verify.token.form', ['email' => $request->email])->with('status', 'Reset token sent to your email.');
    }
}
