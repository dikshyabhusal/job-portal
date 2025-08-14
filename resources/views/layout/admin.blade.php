<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <style>
        .brand-font {
            font-family: 'Pacifico', cursive;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg p-6">
            <div class="text-3xl text-blue-700 font-bold mb-10 brand-font">Job <span class="text-orange-600">Portal</span></div>
            <nav class="flex flex-col space-y-4">
                <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-blue-600 font-medium">Dashboard</a>
                <a href="{{ route('admin.job') }}" class="text-gray-700 hover:text-blue-600 font-medium">Post Job</a>
                <a href="{{ route('adminjobs.view') }}" class="text-gray-700 hover:text-blue-600 font-medium">Show Jobs</a>
                <a href="{{ route('admin.index') }}" class="text-gray-700 hover:text-blue-600 font-medium">View All Applications</a>
                {{-- <a href="{{ route('applications.my') }}" class="text-gray-700 hover:text-blue-600 font-medium">My Job Applications</a> --}}
                {{-- <a href="{{ route('recommend.me') }}" class="text-gray-700 hover:text-blue-600 font-medium">Recommend Me</a> --}}
                <a href="{{ route('admin.user.roles') }}" class="text-gray-700 hover:text-blue-600 font-medium">Permissions</a>
                <a href="{{ route('edit.profile') }}" class="text-gray-700 hover:text-blue-600 font-medium">Edit Profile</a>
                <a href="{{ route('admin-reset-password.form') }}" class="text-gray-700 hover:text-blue-600 font-medium">Reset Password</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-left w-full text-red-600 hover:bg-red-50 px-3 py-2 rounded">Logout</button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-10">
            {{-- <div class="text-2xl font-semibold text-gray-800 mb-6">Welcome, {{ Auth::user()->name }} (Admin)</div> --}}
            <div class="text-2xl font-semibold text-gray-800 mb-6">
    Welcome, {{ optional(Auth::user())->name ?? 'Guest' }}
</div>

            @yield('content')
        </main>
    </div>
</body>
</html>
