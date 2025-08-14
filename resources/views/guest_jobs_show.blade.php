@extends('layout.app')
@section('title', $job->title)

@section('content')
<div class="max-w-4xl mx-auto px-6 py-12">
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-3xl font-bold mb-2 text-blue-700">{{ $job->title }}</h1>
        <p class="text-gray-600 mb-4">{{ $job->company }} — {{ $job->location }}</p>
        <p class="text-gray-800 mb-4">{{ $job->description }}</p>

        <ul class="text-sm text-gray-700 space-y-1">
            <li><strong>Type:</strong> {{ $job->type }}</li>
            <li><strong>Salary:</strong> Rs. {{ $job->salary }}</li>
            <li><strong>Deadline:</strong> {{ \Carbon\Carbon::parse($job->deadline)->format('M d, Y') }}</li>
            <li><strong>Skills:</strong> {{ $job->skills }}</li>
        </ul>

        <a href="{{ route('register') }}" class="mt-6 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Register to Apply
        </a>
    </div>
</div>
@endsection
