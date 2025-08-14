@extends('layout.app')
@section('title', 'Jobs in ' . $category->name)

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">
    <h2 class="text-2xl font-bold mb-6 text-blue-700">Jobs in {{ $category->name }}</h2>

    @if($jobs->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($jobs as $job)
                <div class="bg-white rounded-lg shadow p-4 hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold">{{ $job->title }}</h3>
                    <p class="text-sm text-gray-600 mt-1">{{ $job->company }}</p>
                    <a href="{{ route('guest.jobs.show', $job->id) }}" class="text-blue-600 hover:underline mt-3 inline-block">View Details</a>
                </div>
            @endforeach
        </div>
        <div class="mt-10 text-center">
            {{ $jobs->links() }}
        </div>
    @else
        <p class="text-gray-500 mt-8 text-lg text-center">No jobs in this category yet.</p>
    @endif
</div>
@endsection
