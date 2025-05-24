@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto bg-white p-6 rounded shadow mt-8">
    <!-- Company Info -->
    <div class="flex items-center space-x-6 border-b pb-6 mb-6">
        <img src="{{ asset('storage/company_logo.png') }}" alt="Company Logo" class="w-24 h-24 object-contain border rounded p-2">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">{{ $job->title }}</h2>
            <p class="text-gray-600">{{ $job->company->name }}</p>
            <p class="text-sm text-gray-500">{{ $job->company->industry }}</p>
            <p class="text-sm text-blue-600 font-semibold">Views: {{ $job->views }}</p>
        </div>
        <div class="ml-auto text-right">
            <a href="{{ $job->company->website }}" target="_blank" class="text-blue-500 underline">Visit Official Site</a>
        </div>35411
    </div>

    <!-- Job Details -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div>
            
            <p><strong>Location:</strong> {{ $job->location }}</p>
            <p><strong>Vacancy:</strong> {{ $job->vacancy }}</p>
            <p><strong>Experience:</strong> {{ $job->experience }}</p>
            <p><strong>Job Type:</strong> {{ $job->type }}</p>
            <p><strong>Industry:</strong> {{ $job->industry }}</p>
        </div>
        <div>
            <p><strong>Salary:</strong> {{ $job->salary }}</p>
            <p><strong>Post Date:</strong> {{ $job->created_at->format('M d, Y') }}</p>
            <p><strong>Valid Until:</strong> {{ $job->deadline->format('M d, Y') }}</p>
        </div>
    </div>

    <!-- Specification -->
    <div class="mb-6">
        <h3 class="text-xl font-semibold text-gray-800 mb-2">Job Specification</h3>
        <ul class="list-disc list-inside text-gray-700">
            <li><strong>Qualification Required:</strong> {{ $job->qualification ?? 'Not Available' }}</li>
            <li><strong>Key Skills:</strong> {{ $job->skills }}</li>
            <li><strong>Preferred Age:</strong> {{ $job->age_range }}</li>
            <li><strong>Cover Letter:</strong> {{ $job->cover_letter_required ? 'Required' : 'Not Required' }}</li>
            <li><strong>Functional Area:</strong> {{ $job->functional_area }}</li>
        </ul>
    </div>

    <!-- Description -->
    <div class="mb-6">
        <h3 class="text-xl font-semibold text-gray-800 mb-2">Job Description</h3>
        <div class="prose max-w-none text-gray-700">
            {!! nl2br(e($job->description)) !!}
        </div>
    </div>

    <!-- What We Offer -->
    <div class="mb-6">
        <h3 class="text-xl font-semibold text-gray-800 mb-2">What We Offer</h3>
        <div class="prose max-w-none text-gray-700">
            {!! nl2br(e($job->benefits)) !!}
        </div>
    </div>

    <!-- Instructions -->
    <div class="mb-6">
        <h3 class="text-xl font-semibold text-gray-800 mb-2">Instructions to Apply</h3>
        <p class="text-gray-700">{{ $job->instructions }}</p>
    </div>

    <!-- Action Buttons -->
    <div class="flex justify-between items-center">
        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Apply Now</button>
        <div class="space-x-4">
            <button class="text-blue-600 hover:underline">Share</button>
            <button class="text-blue-600 hover:underline">Bookmark</button>
        </div>
    </div>
</div>
@endsection
