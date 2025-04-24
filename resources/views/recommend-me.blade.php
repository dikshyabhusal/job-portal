@extends('layout.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">🎯 Recommended Jobs for You</h2>
    
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
        <p class="text-gray-500">No recommendations found based on your profile. Please update your skills.</p>
    @endif
</div>
@endsection
