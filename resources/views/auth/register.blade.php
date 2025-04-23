<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white rounded-lg shadow-lg overflow-hidden flex w-full max-w-4xl">

        <!-- Image side -->
        <div class="hidden md:block w-1/2 bg-cover bg-center" 
             style="background-image: url('https://images.unsplash.com/photo-1603791440384-56cd371ee9a7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
        </div>

        <!-- Form side -->
        <div class="w-full md:w-1/2 p-8">
            <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Create an Account</h2>

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
                    <ul class="text-sm list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('custom.register') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1">Name</label>
                    <input type="text" name="name" required 
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1">Email</label>
                    <input type="email" name="email" required 
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1">Password</label>
                    <input type="password" name="password" required 
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold mb-1">Confirm Password</label>
                    <input type="password" name="password_confirmation" required 
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1">Gender</label>
                    <select name="gender" required
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1">Skills (Optional)</label>
                    <input type="text" name="skills"
                        placeholder="E.g. Laravel, React, Python"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                
                <div class="mb-6">
                    <label class="block text-sm font-semibold mb-1">Desired Industry (Optional)</label>
                    <input type="text" name="desired_industry"
                        placeholder="E.g. IT, Education, Health"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                

                <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-green-600 transition duration-300 font-semibold">
                    Register
                </button>

                <p class="mt-4 text-sm text-center text-gray-600">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">Login</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>
