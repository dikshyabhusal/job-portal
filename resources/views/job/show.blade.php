@extends('layout.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 mt-10">

    <h1 class="text-4xl font-extrabold text-center text-orange-600 mb-10">🔥 Explore Job Opportunities</h1>

    <!-- Filters -->
    <form method="GET" action="{{ route('jobs.view') }}" class="mb-12 bg-white border border-orange-200 shadow-md rounded-xl p-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <input type="text" name="title" placeholder="🔍 Job Title" value="{{ request('title') }}"
                class="border border-blue-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            <input type="text" name="company" placeholder="🏢 Company" value="{{ request('company') }}"
                class="border border-blue-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            <input type="text" name="location" placeholder="📍 Location" value="{{ request('location') }}"
                class="border border-blue-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            <select name="type"
                class="border border-blue-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">🕒 All Types</option>
                <option value="Full-time" {{ request('type') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                <option value="Part-time" {{ request('type') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                <option value="Remote" {{ request('type') == 'Remote' ? 'selected' : '' }}>Remote</option>
            </select>
            <input type="text" name="skill" placeholder="📂 Skill" value="{{ request('skill') }}"
                class="border border-blue-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            <input type="number" name="min_salary" placeholder="💰 Min Salary" value="{{ request('min_salary') }}"
                class="border border-blue-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            <input type="number" name="max_salary" placeholder="💰 Max Salary" value="{{ request('max_salary') }}"
                class="border border-blue-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            <select name="sort"
                class="border border-blue-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">🔽 Sort By</option>
                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                <option value="deadline" {{ request('sort') == 'deadline' ? 'selected' : '' }}>Deadline</option>
            </select>
        </div>

        <div class="text-center mt-6">
            <button type="submit"
                class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-6 rounded-lg transition-all duration-300 shadow">
                🎯 Apply Filters
            </button>
        </div>
    </form>

    <!-- Job Listings -->
    @if($jobs->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($jobs as $job)
                <div class="bg-white border border-blue-200 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 p-6 flex flex-col justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-blue-700 mb-2">{{ $job->title }}</h2>
                        <p class="text-gray-600 mb-3">{{ Str::limit($job->description, 90) }}</p>
                        <div class="space-y-1 text-sm text-gray-500 mb-4">
                            <p><span class="font-semibold text-blue-600">Company:</span> {{ $job->company }}</p>
                            <p><span class="font-semibold text-blue-600">Location:</span> {{ $job->location }}</p>
                            <p><span class="font-semibold text-blue-600">Type:</span> {{ $job->type }}</p>
                            <p><span class="font-semibold text-blue-600">Salary:</span> Rs. {{ $job->salary }}</p>
                            <p><span class="font-semibold text-blue-600">Deadline:</span> {{ \Carbon\Carbon::parse($job->deadline)->format('M d, Y') }}</p>
                        </div>
                    </div>
                    <a href="{{ route('applications.create', $job->id) }}"
                       class="mt-auto bg-blue-600 hover:bg-blue-700 text-white text-center font-semibold py-2 px-4 rounded-lg transition duration-300">
                        Apply Now
                    </a>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        {{-- <div class="mt-10 text-center">
            {{ $jobs->links() }}
        </div> --}}
    @else
        <p class="text-center text-gray-500 text-lg mt-10">No jobs found. Try adjusting your filters.</p>
    @endif
</div>
@endsection
