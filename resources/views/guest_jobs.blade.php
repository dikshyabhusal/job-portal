@extends('layout.app')

@section('title', 'Explore Jobs - Guest View')

@section('content')
<!-- 🖼️ Hero Banner -->
<div class="relative bg-blue-50 py-16">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <img src="{{ asset('storage/images/merojob_banner_image.jpg') }}" class="mx-auto mb-6 rounded-lg shadow-lg" alt="Banner Image">

        <h1 class="text-3xl md:text-5xl font-bold text-gray-800 mb-4">Search by Job Title, Skill or Organization</h1>

        <form method="GET" action="{{ route('guest.jobs.search') }}" class="max-w-3xl mx-auto mt-4">
            <input type="text" name="query" placeholder="Search for jobs..." class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-blue-400 focus:border-blue-400">
        </form>

        <!-- Stats -->
        <div class="mt-10 grid grid-cols-1 sm:grid-cols-3 gap-6 text-lg text-gray-700 font-semibold">
            <div>📌 115K+ Jobs Posted</div>
            <div>🎉 523K+ Success Stories</div>
            <div>🌐 384M+ Website Visits</div>
        </div>

        <p class="text-gray-600 mt-6 italic">Thank you for being part of this incredible journey.</p>
    </div>
</div>

<!-- 🏆 Top Jobs -->
<section class="max-w-7xl mx-auto px-6 py-12">
    <h2 class="text-2xl font-bold mb-6 text-blue-700">Top Jobs</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($topJobs as $jobs)
        <div class="bg-white rounded-lg shadow p-4 hover:shadow-lg transition">
            <h3 class="text-xl font-semibold">{{ $jobs->title }}</h3>
            <p class="text-sm text-gray-600 mt-1">{{ $jobs->company }}</p>
            <a href="{{ route('guest.jobs.show', $jobs->id) }}" class="text-blue-600 hover:underline mt-3 inline-block">View Details</a>
        </div>
        @endforeach
    </div>
</section>

<!-- 🔥 Hot Jobs (Same as above, just another section) -->
<section class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-2xl font-bold mb-6 text-red-600">Hot Jobs</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($hotJobs as $job)
            <div class="bg-white rounded-lg shadow p-4 hover:shadow-lg transition">
                <h3 class="text-xl font-semibold">{{ $job->title }}</h3>
                <p class="text-sm text-gray-600 mt-1">{{ $job->company }}</p>
                <a href="{{ route('guest.jobs.show', $job->id) }}" class="text-red-600 hover:underline mt-3 inline-block">View Details</a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- 📂 Jobs By Category -->
<section class="max-w-7xl mx-auto px-6 py-12">
    <h2 class="text-2xl font-bold mb-6">Jobs by Category</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm font-medium text-blue-700">
        @foreach($categories as $category)
        <a href="{{ route('guest.jobs.category', $category->slug) }}" class="block bg-blue-50 p-4 rounded hover:bg-blue-100">{{ $category->name }} ({{ $category->job_count }})</a>
        @endforeach
    </div>
</section>

<!-- 🏭 Jobs By Industry + 💼 Employment Type (Can be grouped) -->

<!-- 📰 Blogs -->
{{-- <section class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-2xl font-bold mb-6">Recent Blogs</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($blogs as $blog)
            <div class="bg-white shadow rounded-lg p-4">
                <h3 class="text-lg font-bold">{{ $blog->title }}</h3>
                <p class="text-sm text-gray-600 mt-2">{{ Str::limit($blog->content, 100) }}</p>
                <a href="{{ route('blogs.show', $blog->slug) }}" class="text-blue-600 hover:underline mt-3 inline-block">Read More</a>
            </div>
            @endforeach
        </div>
    </div>
</section> --}}

<!-- 📱 Mobile App Section -->
<section class="bg-blue-700 text-white py-16">
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-3xl font-bold mb-4">Take Jobs in Pocket with You!</h2>
        <p class="text-lg">Stay updated with new jobs on the go with our official apps.</p>
        <div class="flex justify-center space-x-4 mt-6">
            <a href="#"><img src="{{ asset('storage/images/google-play-badge.png') }}" class="h-12" alt="Google Play"></a>
            <a href="#"><img src="{{ asset('storage/images/app-store-badge.png') }}" class="h-12" alt="App Store"></a>
        </div>
    </div>
</section>

<!-- 🔐 Register/Login CTA -->
<section class="max-w-7xl mx-auto px-6 py-12 text-center">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Want to Apply for Jobs?</h2>
    <p class="text-gray-600 mb-6">Register now and unlock the full potential of our job portal!</p>
    <a href="{{ route('register') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg mr-4 hover:bg-blue-700">Register</a>
    <a href="{{ route('login') }}" class="px-6 py-3 bg-gray-100 text-blue-700 rounded-lg hover:bg-gray-200">Login</a>
</section>
@endsection
