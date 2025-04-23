@extends('layout.guest')

@section('title', 'Home - Dikshya Job Portal')

@section('content')
<body class="bg-white dark:bg-[#0a0a0a] text-[#1b1b18] flex flex-col min-h-screen p-6 lg:p-8">

    {{-- Hero Section --}}
    <section class="flex-1 flex flex-col-reverse lg:flex-row items-center justify-center gap-12 max-w-7xl mx-auto mt-16">

        {{-- Text Content --}}
        <div class="text-center lg:text-left space-y-6 animate-fade-in-up">
            <h2 class="text-5xl font-bold text-blue-700">Find Your Dream Job</h2>
            <p class="text-lg text-gray-600 dark:text-gray-300">Browse thousands of opportunities and connect with top companies. Your career journey starts here!</p>
            <div class="flex justify-center lg:justify-start gap-4">
                <a href="{{ route('register') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Get Started</a>
                <a href="/browse_jobs" class="px-6 py-3 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-600 hover:text-white transition">Browse Jobs</a>
            </div>
        </div>

        {{-- Hero Image --}}
        <div class="w-full max-w-md animate-fade-in">
            <img src="https://cdn.dribbble.com/users/1162077/screenshots/3848914/job_search.gif" alt="Job search animation" class="rounded-xl shadow-lg" />
        </div>

    </section>

    {{-- Features Section --}}
    <section class="max-w-6xl mx-auto mt-24 text-center">
        <h3 class="text-3xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Why Choose Us?</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="p-6 border rounded-lg shadow hover:shadow-lg transition">
                <h4 class="text-xl font-bold text-blue-600 mb-2">Verified Listings</h4>
                <p class="text-gray-600 dark:text-gray-300">Only genuine, verified job postings from trusted companies.</p>
            </div>
            <div class="p-6 border rounded-lg shadow hover:shadow-lg transition">
                <h4 class="text-xl font-bold text-blue-600 mb-2">Easy Application</h4>
                <p class="text-gray-600 dark:text-gray-300">Simple, quick application process with resume upload support.</p>
            </div>
            <div class="p-6 border rounded-lg shadow hover:shadow-lg transition">
                <h4 class="text-xl font-bold text-blue-600 mb-2">Career Support</h4>
                <p class="text-gray-600 dark:text-gray-300">Guides, tips, and resources to help you succeed in your career journey.</p>
            </div>
        </div>
    </section>

    {{-- Call to Action --}}
    <div class="text-center mt-20 mb-10">
        <h3 class="text-3xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Start Applying Today!</h3>
        <a href="{{ route('register') }}" class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Join Now</a>
    </div>

</body>
@endsection
