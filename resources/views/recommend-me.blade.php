@extends('layout.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">🎯 Get Recommended Jobs</h2>

    <!-- Job Criteria Form -->
    <form method="GET" action="{{ route('recommend.me') }}" class="mb-8 bg-white p-6 rounded-lg shadow">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input type="text" name="title" placeholder="Job Title" class="form-input">
            <input type="text" name="location" placeholder="Preferred Location" class="form-input">
            <input type="text" name="skills" placeholder="Your Skills (comma-separated)" class="form-input">
            <input type="number" name="experience" placeholder="Years of Experience" class="form-input">
        </div>
        <div class="mt-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Get Recommendations</button>
        </div>
    </form>

    <h2 class="text-2xl font-bold text-gray-800 mb-6">Recommended Jobs for You</h2>

    @if($recommendedJobs->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($recommendedJobs as $job)
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $job->title }}</h3>
                    <p class="text-gray-600 mb-3">{{ $job->company_name }}</p>
                    <a href="{{ route('applications.create', $job->id) }}" class="text-blue-600 font-medium hover:underline">Apply Now</a>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500">No recommendations found based on your criteria. Try changing the inputs.</p>
    @endif
</div>
@endsection
