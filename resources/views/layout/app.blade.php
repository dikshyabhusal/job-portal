<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        .brand-font {
            font-family: 'Pacifico', cursive;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dropdownButton = document.getElementById('dropdownButton');
            const dropdownMenu = document.getElementById('profileDropdown');

            if (dropdownButton) {
                dropdownButton.addEventListener('click', function (event) {
                    event.stopPropagation();
                    dropdownMenu.classList.toggle('hidden');
                });

                document.addEventListener('click', function () {
                    dropdownMenu.classList.add('hidden');
                });
            }
        });
    </script>
</head>
<body class="bg-gray-100">

<!-- Navbar -->
<nav class="bg-white shadow-md px-6 py-4 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="text-3xl font-bold text-blue-700 brand-font">
            Rojgar <span class="text-orange-600">Sewa</span>
        </a>

        <!-- Navigation Links -->
        <div class="hidden md:flex items-center space-x-6">
            <a href="/about-us" class="nav-link">About Us</a>
            <a href="{{ route('browse.jobs') }}" class="nav-link">Browse Jobs</a>
            <a href="{{ route('help') }}" class="nav-link">FAQ</a>
            <a href="{{ route('contact.form') }}" class="nav-link">Contact Us</a>

            @auth
                @php $user = Auth::user(); @endphp

                @if($user->hasRole('admin'))
                    <a href="{{ route('post.job') }}" class="nav-link">Post Job</a>
                    <a href="{{ route('jobs.view') }}" class="nav-link">Show Job</a>
                    <a href="{{ route('applications.index') }}" class="nav-link">View All Applications</a>
                    <a href="{{ route('applications.my') }}" class="nav-link">My Job Applications</a>
                    <a href="{{ route('recommend.me') }}" class="nav-link">Recommend Me</a>
                    <a href="{{ route('admin.user.roles') }}" class="nav-link">Permissions</a>
                @endif

                @if($user->hasRole('employer'))
                    <a href="{{ route('jobs.view') }}" class="nav-link">Show Job</a>
                    <a href="{{ route('post.job') }}" class="nav-link">Post Job</a>
                    <a href="{{ route('applications.index') }}" class="nav-link">View Applications</a>
                @endif

                @if($user->hasRole('job_seeker'))
                    <a href="{{ route('applications.index') }}" class="nav-link">All Applications</a>
                    <a href="{{ route('jobs.view') }}" class="nav-link">Show Job</a>
                    <a href="{{ route('applications.my') }}" class="nav-link">My Applications</a>
                    <a href="{{ route('recommend.me') }}" class="nav-link">Recommend Me</a>
                @endif
            @endauth
        </div>

        <!-- Profile Dropdown -->
        <div class="relative">
            @auth
                <button id="dropdownButton" class="flex items-center bg-blue-100 hover:bg-blue-200 text-blue-900 px-4 py-2 rounded-full transition">
                    <span class="mr-2 font-semibold">{{ Auth::user()->name }}</span>
                    <svg class="w-5 h-5 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden z-50">
                    <a href="{{ route('profile.view') }}" class="block px-4 py-3 text-gray-700 hover:bg-gray-100">View Profile</a>
                    <a href="{{ route('reset-password.form') }}" class="block px-4 py-3 text-gray-700 hover:bg-gray-100">Reset Password</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-3 text-red-600 hover:bg-red-100">Logout</button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}" class="text-blue-700 font-semibold px-4 py-2 rounded-lg hover:bg-blue-50 transition">Login</a>
                <a href="{{ route('register') }}" class="text-white bg-blue-700 px-4 py-2 rounded-lg hover:bg-blue-800 transition">Register</a>
            @endauth
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="p-8">
    @yield('content')
</div>

<!-- Footer -->
<footer class="bg-white mt-16 shadow-inner">
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
        <div class="text-gray-600 text-sm">
            &copy; {{ date('Y') }} <span class="text-blue-700 font-semibold brand-font">Rojgar <span class="text-orange-600">Sewa</span></span>. All rights reserved.
        </div>
        <div class="flex space-x-6">
            <a href="/about-us" class="text-gray-500 hover:text-blue-600 transition">About Us</a>
            <a href="{{ route('contact.form') }}" class="text-gray-500 hover:text-blue-600 transition">Contact</a>
            <a href="{{ route('privacy.policy') }}" class="text-gray-500 hover:text-blue-600 transition">Privacy Policy</a>
        </div>
    </div>
</footer>

</body>
</html>
