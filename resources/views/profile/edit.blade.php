@extends('layout.app')

@section('title', 'Edit Profile')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Profile</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 mb-4 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Profile Photo -->
        <div class="mb-6 flex items-center space-x-4">
            <!-- Current Profile Photo -->
            <div class="w-24 h-24 rounded-full overflow-hidden bg-gray-200">
                <img src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : 'https://via.placeholder.com/150' }}"
                    alt="Profile Photo" class="w-full h-full object-cover">
            </div>

            <!-- File input -->
            <div class="mb-4">
                <label for="profile_photo" class="text-gray-700 font-medium">Change Profile Photo</label>
                <input type="file" name="profile_photo" id="profile_photo"
                    class="mt-2 p-2 border border-gray-300 rounded">
            </div>
        </div>

        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="text-gray-700 font-medium">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}"
                class="w-full mt-2 p-3 border border-gray-300 rounded @error('name') border-red-500 @enderror" required>
            @error('name')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-6">
            <label for="email" class="text-gray-700 font-medium">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', Auth::user()->email) }}"
                class="w-full mt-2 p-3 border border-gray-300 rounded @error('email') border-red-500 @enderror" required>
            @error('email')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">Save Changes</button>
    </form>
</div>
@endsection
