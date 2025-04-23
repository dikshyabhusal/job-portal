<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Job Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="flex bg-white rounded-lg shadow-lg overflow-hidden max-w-4xl w-full">
        
        <!-- Left Image Section -->
        <div class="hidden md:block md:w-1/2">
            <img src="https://images.unsplash.com/photo-1581090700227-1e37b190418e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                 alt="Job Portal" class="object-cover w-full h-full">
        </div>

        <!-- Right Login Form -->
        <div class="w-full md:w-1/2 p-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Welcome to Job Portal</h2>

            @if(session('success'))
            <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
                {{ session('success') }}
            </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('custom.login') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1">Email</label>
                    <input type="email" name="email" required 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1">Password</label>
                    <input type="password" name="password" required 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-6 text-right">
                    <a href="{{ route('forgot.password') }}" class="text-sm text-blue-600 hover:underline">Forgot Password?</a>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-200 font-semibold text-lg">
                    Login
                </button>
            </form>

            <!-- Create account link -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">New here? 
                    <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline">Create Account</a>
                </p>
            </div>
        </div>

    </div>

</body>
</html>
