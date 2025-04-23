@extends('layout.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 mt-10">
    <h1 class="text-4xl font-bold text-center text-gray-800 mb-10">Browse Jobs</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 mb-6 rounded-lg text-center">
            {{ session('success') }}
        </div>
    @endif

    @if($jobs->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($jobs as $job)
                <div class="bg-white rounded-lg shadow-lg hover:shadow-2xl transition duration-300 p-6 flex flex-col justify-between">
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-800 mb-3">{{ $job->title }}</h2>
                        <p class="text-gray-600 mb-4">{{ $job->description }}</p>
                        <div class="space-y-1 text-sm text-gray-500 mb-4">
                            <p><strong></strong> {{ $job->location }}</p>
                        </div>
                    </div>
                    <a href="{{ route('applications.create', $job->id) }}"
                        class="block text-center mt-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                        Apply Now
                    </a>
                    {{-- <a href="{{ asset('storage/' . $application->cv) }}" target="_blank">View CV</a> --}}

                    {{-- <div class="mt-6">
                        <a href="{{ route('jobs.index') }}" class="text-blue-600 hover:underline text-sm">&larr; Back to Jobs</a>
                    </div> --}}
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-gray-500 text-lg">No jobs posted yet.</p>
    @endif
</div>
@endsection
