@extends('layout.admin') {{-- Custom layout for admin with sidebar --}}

@section('title', 'Admin Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Report Cards -->
    <div class="bg-white shadow rounded-lg p-6 text-center">
        <h2 class="text-lg font-semibold text-gray-700">Total Job Seekers</h2>
        <p class="text-3xl font-bold text-blue-600 mt-2">{{ $jobSeekersCount }}</p>
    </div>

    <div class="bg-white shadow rounded-lg p-6 text-center">
        <h2 class="text-lg font-semibold text-gray-700">Total Employers</h2>
        <p class="text-3xl font-bold text-green-600 mt-2">{{ $employersCount }}</p>
    </div>

    <div class="bg-white shadow rounded-lg p-6 text-center">
        <h2 class="text-lg font-semibold text-gray-700">Total Admins</h2>
        <p class="text-3xl font-bold text-purple-600 mt-2">{{ $adminCount }}</p>
    </div>
</div>

<!-- Latest Jobs -->
<div class="bg-white shadow rounded-lg p-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">🔥 Latest Jobs</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @forelse($latestJobs as $job)
            <div class="border p-4 rounded-lg shadow-sm hover:shadow-md transition">
                <h3 class="text-lg font-semibold text-blue-700">{{ $job->title }}</h3>
                <p class="text-gray-600 text-sm">{{ $job->company_name }}</p>
                <p class="text-sm mt-1">{{ Str::limit($job->description, 80) }}</p>
                <a href="{{ route('jobs.view') }}" class="inline-block mt-2 text-blue-600 text-sm hover:underline">View Job</a>
            </div>
        @empty
            <p class="text-gray-600">No recent jobs found.</p>
        @endforelse
    </div>
</div>
@endsection
