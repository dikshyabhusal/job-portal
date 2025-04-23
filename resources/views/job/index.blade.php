@extends('layout.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 mt-12">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($jobs as $job)
            <a href="{{ route('jobs.show', $job->id) }}"
                class="block bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300 p-5 border border-gray-200 hover:border-blue-500">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2 hover:text-blue-600 transition">
                    {{ $job->title }}
                </h2>
                <p class="text-sm text-gray-500">
                    {{ $job->location }}
                </p>
            </a>
        @endforeach
    </div>
    
</div>
@endsection
