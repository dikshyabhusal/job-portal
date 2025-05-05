<!DOCTYPE html>
<html>
<head>
    <title>Password Reset Verification Code</title>
</head>
<body>
    <h2>Hello, {{ $user->name }}!</h2>
    <p>Your password reset verification code is:</p>
    <h1>{{ $user->verification_code }}</h1>
    <p>If you didn't request this, you can safely ignore this email.</p>
</body>
</html>
