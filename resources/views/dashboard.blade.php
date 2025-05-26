@extends('layout.app')
@section('title', 'Find Your Dream Job')

@section('content')
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

{{-- Hero Section --}}
<section class="relative bg-gradient-to-r from-blue-700 via-blue-500 to-indigo-600 text-white py-24">
    <div class="max-w-6xl mx-auto px-6 text-center" data-aos="zoom-in">
        <h1 class="text-4xl md:text-6xl font-bold mb-4">Discover Your Perfect Job</h1>
        <p class="text-xl mb-8">Search thousands of jobs from top companies. Apply now and take the next step in your career.</p>
        <form action="{{ route('jobs.search') }}" method="GET" class="flex flex-col md:flex-row items-center justify-center gap-4">
            <input type="text" name="query" placeholder="Search job by title, skill or company" class="px-6 py-3 rounded w-full md:w-2/3 text-gray-800" />
            <button class="bg-orange-500 hover:bg-orange-600 px-6 py-3 rounded text-white font-semibold">Search</button>
        </form>
    </div>
</section>

{{-- Categories --}}
{{-- <section class="py-16 bg-gray-100">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold mb-10 text-center" data-aos="fade-up">Browse Job Categories</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
            @php
                $categories = ['IT & Tech', 'Design', 'Marketing', 'Finance', 'Health', 'Education'];
            @endphp
            @foreach($categories as $category)
                <div class="bg-white p-4 rounded shadow hover:shadow-md transition text-center" data-aos="fade-up">
                    <img src="/images/icons/{{ strtolower(str_replace(' ', '-', $category)) }}.svg" class="w-12 h-12 mx-auto mb-3" />
                    <span class="text-gray-800 font-medium">{{ $category }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section> --}}

{{-- Main Section --}}
<section class="max-w-6xl mx-auto px-6 py-16 grid grid-cols-1 lg:grid-cols-4 gap-10">
    <div class="lg:col-span-3">
        {{-- Featured Jobs --}}
        <div class="mb-12" data-aos="fade-up">
            <h2 class="text-2xl font-bold mb-6">🔥 Featured Jobs</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($jobs as $job)
                    <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transition" data-aos="zoom-in">
                        <h3 class="font-bold text-lg">{{ $job->title }}</h3>
                        <p class="text-gray-600">{{ $job->company }}</p>
                        <p class="text-sm text-gray-500">{{ $job->location }}</p>
                        <a href="{{ route('applications.create', $job->id) }}" class="block mt-4 text-blue-600 font-semibold hover:underline">Apply Now</a>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Latest Jobs List --}}
        <div data-aos="fade-up">
            <h2 class="text-2xl font-bold mb-6">🆕 Latest Jobs</h2>
            <ul class="space-y-4">
                @foreach($jobs as $job)
                    <li class="bg-gray-50 p-4 rounded flex justify-between items-center">
                        <span>{{ $job->title }} @ {{ $job->company }}</span>
                        <a href="{{ route('applications.create', $job->id) }}" class="text-orange-500 hover:underline">Apply</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    {{-- Sidebar Banner Section --}}
    <aside data-aos="fade-left">
        <h3 class="text-lg font-semibold mb-4">📢 Sponsored</h3>
        <div class="space-y-4">
            <img src="{{ asset('storage/ads/ad1.jpg') }}" class="rounded shadow hover:scale-105 transition" />
            <img src="{{ asset('storage/ads/ad2.jpg') }}" class="rounded shadow hover:scale-105 transition" />
            <img src="{{ asset('storage/ads/ad3.jpg') }}" class="rounded shadow hover:scale-105 transition" />
            <img src="{{ asset('storage/ads/ad4.jpg') }}" class="rounded shadow hover:scale-105 transition" />
            <img src="{{ asset('storage/ads/ad5.jpg') }}" class="rounded shadow hover:scale-105 transition" />
            <img src="{{ asset('storage/ads/ad6.jpg') }}" class="rounded shadow hover:scale-105 transition" />
            
        </div>
    </aside>
</section>

{{-- Trusted Companies Section --}}
<section class="bg-white py-16">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-xl font-semibold mb-6" data-aos="fade-up">Trusted by Top Companies</h2>
        <div class="flex flex-wrap justify-center gap-6" data-aos="fade-up">
            <img src="{{ asset('storage/logos/logo1.jpg') }}" class="h-10" />
            <img src="{{ asset('storage/logos/logo2.jpg') }}" class="h-10" />
            <img src="{{ asset('storage/logos/logo3.jpg') }}" class="h-10" />
            <img src="{{ asset('storage/logos/logo4.jpg') }}" class="h-10" />
        </div>
    </div>
</section>



{{-- Footer --}}
<footer class="bg-gray-800 text-white py-10">
    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-6">
        <div>
            <h3 class="font-bold text-lg mb-3">About Us</h3>
            <p class="text-gray-300">Your trusted job platform to find meaningful opportunities.</p>
        </div>
        <div>
            <h3 class="font-bold text-lg mb-3">Subscribe for Updates</h3>
            <form class="flex gap-2">
                <input type="email" placeholder="Enter your email" class="px-4 py-2 rounded text-gray-800 w-full" />
                <button class="bg-orange-500 px-4 py-2 rounded hover:bg-orange-600">Subscribe</button>
            </form>
        </div>
    </div>
</footer>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>AOS.init();</script>
@endsection
