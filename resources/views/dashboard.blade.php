@extends('layout.app')

@section('title', 'Dashboard')

@section('content')


    
<form action="{{ route('jobs.search') }}" method="GET" class="max-w-5xl mx-auto flex flex-col md:flex-row items-center gap-4">
    <!-- Job Keyword Input -->
    <input 
        type="text" 
        name="query"
        placeholder="Search Job by Title, Keyskill, Company" 
        class="w-full md:w-4/5 px-7 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-300" 
    />


    <!-- Search Button -->
    <button 
        type="submit"
        class="bg-orange-600 text-white font-semibold px-6 py-2 rounded hover:bg-orange-700 transition duration-300">
        SEARCH JOB
    </button>
</form>


<!-- Hero Section -->
    <div class="bg-blue-50 p-8 rounded-lg mb-10 text-center">
        <h1 class="text-4xl font-bold text-blue-800 mb-4">Welcome to Job Portal, {{ Auth::user()->name }}!</h1>
        <p class="text-gray-600 mb-6">Find your dream job, apply easily, and boost your career.</p>
        <!-- Role Based Dashboard Links -->
        <div class="mt-6">
            @role('admin')
                <a href="/admin/dashboard" ></a>
            @endrole

            @role('employer')
                <a href="/employer/dashboard"></a>
            @endrole

            @role('job_seeker')
                <a href="/job-seeker/dashboard" ></a>
            @endrole
        </div>
    <a href="{{ route('browse.jobs') }}" class="bg-orange-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">Browse Jobs</a>
        
    </div>

    {{-- feature job --}}
    <div class="mb-10">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">🔥 Features Jobs</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($jobs as $job)
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $job->title }}</h3>
                    <p class="text-gray-600 mb-3">{{ $job->company }}</p>
                    <a href="{{ route('applications.feature', $job->id) }}" class="text-blue-600 font-medium hover:underline">Apply Now</a>
                </div>
            @empty
                <p class="text-gray-600">No latest jobs available at the moment.</p>
            @endforelse
        </div>
    </div>
    

    <!-- Latest Jobs -->
    <div class="mb-10">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">🆕 Latest Jobs</h2>
        <ul class="space-y-4">
            @forelse($jobs as $job)
            <li class="bg-white p-4 rounded shadow flex justify-between items-center">
                <span>{{ $job->title }} at {{ $job->company }}</span>
                <a href="{{ route('application.latest', $job->id) }}" class="text-blue-600 hover:underline">Apply</a>
            </li>
            @empty
            <p class="text-gray-600">No latest jobs available at the moment.</p>
            @endforelse
            
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
