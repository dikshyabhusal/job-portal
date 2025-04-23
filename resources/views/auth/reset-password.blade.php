@if(session('message'))
    <p>{{ session('message') }}</p>
@endif

<form method="POST" action="{{ route('send.verification.code') }}">
    @csrf
    <button type="submit">Send Verification Code</button>
</form>

<form method="POST" action="{{ route('update.password') }}">
    @csrf
    <input type="text" name="verification_code" placeholder="Enter verification code" required>
    <input type="password" name="password" placeholder="New Password" required>
    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
    <button type="submit">Update Password</button>
</form>
