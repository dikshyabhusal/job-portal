<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <h1 class="text-2xl font-bold mb-4">Forgot Password</h1>

    <form method="POST" action="{{ route('forgot.password.send') }}">
        @csrf
        <div class="mb-4">
            <label for="email" class="block">Email</label>
            <input type="email" name="email" id="email" class="border p-2 w-full" required>
        </div>
        
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Send Reset Token</button>
    </form>

    @if (session('status'))
        <div class="mt-4 text-green-600">{{ session('status') }}</div>
    @endif

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
