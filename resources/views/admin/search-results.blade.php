@extends('layout.admin')

@section('title', 'Search Results')

@section('content')
<div class="max-w-5xl mx-auto py-10">
    <h2 class="text-2xl font-bold mb-6">Search Results</h2>

    @if($jobs->isEmpty())
        <p class="text-gray-600">No jobs matched your criteria.</p>
    @else
        @foreach($jobs as $job)
            <div class="bg-white p-4 mb-4 rounded shadow">
                <h3 class="text-lg font-semibold">{{ $job->title }}</h3>
                <p>{{ $job->company }} - {{ $job->location }}</p>
                {{-- <p class="text-sm text-gray-500">Skills: {{ $job->skills }}</p> --}}
                <a href="{{ route('applications.create', $job->id) }}" class="text-blue-600 hover:underline">Apply Now</a>
            </div>
        @endforeach
    @endif
</div>
@endsection
