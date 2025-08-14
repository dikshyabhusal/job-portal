@extends('layout.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <h1 class="text-3xl font-bold text-blue-700 mb-6">📚 Available Training Sessions</h1>

    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-4 rounded mb-6">{{ session('error') }}</div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($sessions as $session)
            @php
                $deadline = \Carbon\Carbon::parse($session->start_date)->subDays(15);
            @endphp
            <div class="bg-white border border-blue-300 p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-orange-600">{{ $session->title }}</h2>
                <p class="text-gray-600">{{ $session->description }}</p>
                <p class="mt-2 text-sm text-gray-500">Category: {{ $session->category }}</p>
                <p class="text-sm text-gray-500">Starts: {{ \Carbon\Carbon::parse($session->start_date)->format('M d, Y') }}</p>
                <p class="text-sm text-gray-500">Fee: Rs. {{ $session->fee }}</p>
                @if(now()->lt($deadline))
                    <a href="{{ route('trainings.enroll', $session->id) }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Enroll Now</a>
                @else
                    <p class="mt-4 text-red-500 font-semibold">Enrollment Closed</p>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection
