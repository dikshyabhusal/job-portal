<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <h1 class="text-2xl font-bold mb-4">Reset Password</h1>

    <form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="email" value="{{ request()->email }}">
    <input type="hidden" name="token" value="{{ $token }}">

    
    <label>New Password</label>
    <input type="password" name="password" class="border p-2 w-full" required>

    <label>Confirm Password</label>
    <input type="password" name="password_confirmation" class="border p-2 w-full" required>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded mt-4">Reset Password</button>
</form>


    @if ($errors->any())
        <div class="mt-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>
