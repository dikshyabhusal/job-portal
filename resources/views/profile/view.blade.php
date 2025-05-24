@extends('layout.app')

@section('title', 'View Profile')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6 mt-8">

    <!-- Header with profile image and name -->
    <div class="flex flex-col md:flex-row items-center gap-6 mb-8">
        <img src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : 'https://via.placeholder.com/150' }}" 
             class="w-32 h-32 rounded-full object-cover" alt="Profile Photo">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">{{ $user->name }}</h2>
            <p class="text-gray-500 capitalize">{{ $user->hasRole('job_seeker') ? 'Job Seeker' : 'Employer' }}</p>
        </div>
        <div class="ml-auto">
            <a href="{{ route('profile.edit') }}" class="inline-block bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 font-semibold">
                Edit Profile
            </a>
        </div>
    </div>

    <!-- Basic Info -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div><strong class="text-gray-600">Email:</strong> {{ $user->email }}</div>
        <div><strong class="text-gray-600">Gender:</strong> {{ $user->gender }}</div>
    </div>

    <!-- Role-specific Fields -->
    @if ($user->hasRole('job_seeker'))
        <div class="mt-4">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Job Seeker Info</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div><strong class="text-gray-600">Skills:</strong> {{ $user->skills ?? 'N/A' }}</div>
                <div><strong class="text-gray-600">Desired Industry:</strong> {{ $user->desired_industry ?? 'N/A' }}</div>
            </div>
        </div>
    @elseif ($user->hasRole('employer'))
        <div class="mt-4">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Employer Info</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div><strong class="text-gray-600">Company Name:</strong> {{ $user->company_name ?? 'N/A' }}</div>
                <div><strong class="text-gray-600">Industry:</strong> {{ $user->company_industry ?? 'N/A' }}</div>
                <div><strong class="text-gray-600">Contact:</strong> {{ $user->company_contact ?? 'N/A' }}</div>
            </div>
        </div>
    @endif

</div>
@endsection
