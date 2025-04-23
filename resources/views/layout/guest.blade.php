<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font for Job Portal -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <style>
        .brand-font {
            font-family: 'Pacifico', cursive;
        }
    </style>

    <script>
        // Dropdown toggle and click-outside logic
        document.addEventListener('DOMContentLoaded', function () {
            const dropdownButton = document.getElementById('dropdownButton');
            const dropdownMenu = document.getElementById('profileDropdown');

            dropdownButton.addEventListener('click', function (event) {
                event.stopPropagation();
                dropdownMenu.classList.toggle('hidden');
            });

            document.addEventListener('click', function () {
                dropdownMenu.classList.add('hidden');
            });
        });
    </script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow p-4 flex justify-between items-center">
        <div class="text-2xl font-bold text-blue-700 brand-font">Job Portal</div>

        <div class="flex items-center space-x-6">
            <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600 font-medium">Home</a>
            <a href="/about-us" class="text-gray-700 hover:text-blue-600 font-medium">About Us</a>
            <a href="{{ route('browse.jobs') }}" class="text-gray-700 hover:text-blue-600 font-medium">Browse Jobs</a>
            <a href="{{ route('post.job') }}" class="text-gray-700 hover:text-blue-600 font-medium">Post Job</a>
            <a href="{{ route('jobs.view') }}" class="text-gray-700 hover:text-blue-600 font-medium">Show Job</a>
            <a href="{{ route('applications.index') }}" class="text-gray-700 hover:text-blue-600 font-medium">View All Applications</a>
            <a href="{{ route('applications.my') }}" class="text-gray-700 hover:text-blue-600 font-medium">My Job Applications</a>

            <!-- Profile dropdown -->
            <div class="relative">
                

                <!-- Dropdown menu -->
                <div id="profileDropdown" class="absolute right-0 mt-2 w-52 bg-white rounded-lg shadow-lg hidden z-20 transition-all duration-300">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-3 text-gray-700 hover:bg-blue-50">Edit Profile</a>
                    <a href="{{ route('reset-password.form') }}" class="block px-4 py-3 text-gray-700 hover:bg-blue-50">Reset Password</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-3 text-red-600 hover:bg-red-50">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="p-8">
        @yield('content')
    </div>
    <footer class="bg-white mt-16 shadow-inner">
        <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
            <div class="text-gray-600 text-sm">
                &copy; {{ date('Y') }} <span class="text-blue-700 font-semibold brand-font">Job Portal</span>. All rights reserved.
            </div>
    
            <div class="flex space-x-6">
                <a href="#" class="text-gray-500 hover:text-blue-600 transition">About Us</a>
                <a href="#" class="text-gray-500 hover:text-blue-600 transition">Contact</a>
                <a href="#" class="text-gray-500 hover:text-blue-600 transition">Privacy Policy</a>
            </div>
        </div>
    </footer>

</body>
</html>
