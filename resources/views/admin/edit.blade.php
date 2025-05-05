@extends('layout.admin')

@section('title', 'Edit Profile')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded-2xl shadow-xl">
    <h2 class="text-3xl font-extrabold text-gray-800 mb-6 text-center">Edit Your Profile</h2>

    @if (session('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 p-4 mb-6 rounded-lg text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Profile Photo -->
        <div class="flex items-center space-x-6">
            <!-- Current Profile Photo -->
            <div class="w-24 h-24 rounded-full border-4 border-blue-200 overflow-hidden shadow-md">
                <img src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : 'https://via.placeholder.com/150' }}"
                    alt="Profile Photo" class="w-full h-full object-cover">
            </div>

            <!-- File input -->
            <div>
                <label for="profile_photo" class="block text-sm font-medium text-gray-700 mb-1">Change Profile Photo</label>
                <input type="file" name="profile_photo" id="profile_photo"
                    class="block w-full text-sm text-gray-600 border border-gray-300 rounded-lg cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}"
                class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
            <input type="email" name="email" id="email" value="{{ old('email', Auth::user()->email) }}"
                class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror" required>
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="pt-4">
            <button type="submit"
                class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white text-lg font-semibold py-3 rounded-xl shadow hover:from-blue-700 hover:to-blue-800 transition duration-200">
                Save Changes
            </button>
        </div>
    </form>
</div>
@endsection
