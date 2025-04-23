@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
    <!-- Hero Section -->
    <div class="bg-blue-50 p-8 rounded-lg mb-10 text-center">
        <h1 class="text-4xl font-bold text-blue-800 mb-4">Welcome to Job Portal, {{ Auth::user()->name }}!</h1>
        <p class="text-gray-600 mb-6">Find your dream job, apply easily, and boost your career.</p>
        <a href="{{ route('browse.jobs') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">Browse Jobs</a>
    </div>

    <!-- Featured Jobs -->
    <div class="mb-10">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">🔥 Featured Jobs</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="text-xl font-bold text-gray-800 mb-2">Frontend Developer</h3>
                <p class="text-gray-600 mb-3">Tech Solutions Pvt. Ltd</p>
                <a href="#" class="text-blue-600 font-medium hover:underline">Apply Now</a>
            </div>
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="text-xl font-bold text-gray-800 mb-2">Digital Marketing Officer</h3>
                <p class="text-gray-600 mb-3">Creative Minds Inc.</p>
                <a href="#" class="text-blue-600 font-medium hover:underline">Apply Now</a>
            </div>
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="text-xl font-bold text-gray-800 mb-2">Laravel Backend Developer</h3>
                <p class="text-gray-600 mb-3">CodeBase Nepal</p>
                <a href="#" class="text-blue-600 font-medium hover:underline">Apply Now</a>
            </div>
        </div>
    </div>

    <!-- Latest Jobs -->
    <div class="mb-10">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">🆕 Latest Jobs</h2>
        <ul class="space-y-4">
            <li class="bg-white p-4 rounded shadow flex justify-between items-center">
                <span>UI/UX Designer at Pixel Studio</span>
                <a href="#" class="text-blue-600 hover:underline">Apply</a>
            </li>
            <li class="bg-white p-4 rounded shadow flex justify-between items-center">
                <span>WordPress Developer at WebTech</span>
                <a href="#" class="text-blue-600 hover:underline">Apply</a>
            </li>
            <li class="bg-white p-4 rounded shadow flex justify-between items-center">
                <span>Data Analyst at Insight Analytics</span>
                <a href="#" class="text-blue-600 hover:underline">Apply</a>
            </li>
        </ul>
    </div>

    <!-- Categories -->
    <div class="mb-10">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">📁 Browse by Category</h2>
        <div class="flex flex-wrap gap-4">
            <a href="#" class="bg-blue-100 text-blue-800 px-4 py-2 rounded-full hover:bg-blue-200 transition">IT & Software</a>
            <a href="#" class="bg-blue-100 text-blue-800 px-4 py-2 rounded-full hover:bg-blue-200 transition">Design & Creative</a>
            <a href="#" class="bg-blue-100 text-blue-800 px-4 py-2 rounded-full hover:bg-blue-200 transition">Sales & Marketing</a>
            <a href="#" class="bg-blue-100 text-blue-800 px-4 py-2 rounded-full hover:bg-blue-200 transition">Finance</a>
            <a href="#" class="bg-blue-100 text-blue-800 px-4 py-2 rounded-full hover:bg-blue-200 transition">Education</a>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="bg-blue-600 p-8 rounded-lg text-center text-white">
        <h2 class="text-3xl font-bold mb-4">Ready to apply?</h2>
        <p class="mb-6">Create your profile, upload your resume, and get hired by top companies!</p>
        <a href="{{ route('browse.jobs') }}" class="bg-white text-blue-600 font-semibold px-6 py-3 rounded-lg hover:bg-gray-100 transition">Get Started</a>
    </div>
@endsection
