@extends('layout.app')

@section('title', 'Edit Profile')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow">
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
            <div class="w-24 h-24 rounded-full overflow-hidden bg-gray-200">
                <img src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : 'https://via.placeholder.com/150' }}"
                    alt="Profile Photo" class="w-full h-full object-cover">
            </div>
            <div class="mb-4">
                <label for="profile_photo" class="text-gray-700 font-medium">Change Profile Photo</label>
                <input type="file" name="profile_photo" id="profile_photo"
                    class="mt-2 p-2 border border-gray-300 rounded">
            </div>
        </div>

        <!-- Common Fields -->
        <div class="mb-4">
            <label for="name" class="text-gray-700 font-medium">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}"
                class="w-full mt-2 p-3 border border-gray-300 rounded @error('name') border-red-500 @enderror" required>
            
        </div>

        <div class="mb-4">
            <label for="email" class="text-gray-700 font-medium">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', Auth::user()->email) }}"
                class="w-full mt-2 p-3 border border-gray-300 rounded @error('email') border-red-500 @enderror" required>
            
        </div>

        <div class="mb-4">
            <label for="gender" class="text-gray-700 font-medium">Gender</label>
            <select name="gender" id="gender"
                class="w-full mt-2 p-3 border border-gray-300 rounded @error('gender') border-red-500 @enderror" required>
                <option value="">Select Gender</option>
                <option value="Male" {{ Auth::user()->gender === 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ Auth::user()->gender === 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ Auth::user()->gender === 'Other' ? 'selected' : '' }}>Other</option>
            </select>
            
        </div>

        <!-- Role Specific Fields -->
        @if (Auth::user()->hasRole('job_seeker'))
            <div class="mb-4">
                <label for="skills" class="text-gray-700 font-medium">Skills</label>
                <input type="text" name="skills" id="skills"
                    value="{{ old('skills', Auth::user()->skills) }}"
                    class="w-full mt-2 p-3 border border-gray-300 rounded @error('skills') border-red-500 @enderror">
                
            </div>

            <div class="mb-4">
                <label for="desired_industry" class="text-gray-700 font-medium">Desired Industry</label>
                <select name="desired_industry" id="desired_industry"
                    class="w-full mt-2 p-3 border border-gray-300 rounded @error('desired_industry') border-red-500 @enderror">
                    <option value="">Select Industry</option>
                    @foreach ($industries as $industry)
                        <option value="{{ $industry }}" {{ Auth::user()->desired_industry === $industry ? 'selected' : '' }}>
                            {{ $industry }}
                        </option>
                    @endforeach
                </select>
                
            </div>
        @elseif (Auth::user()->hasRole('employer'))
            <div class="mb-4">
                <label for="company_name" class="text-gray-700 font-medium">Company Name</label>
                <input type="text" name="company_name" id="company_name"
                    value="{{ old('company_name', Auth::user()->company_name) }}"
                    class="w-full mt-2 p-3 border border-gray-300 rounded">
            </div>

            <div class="mb-4">
                <label for="company_industry" class="text-gray-700 font-medium">Company Industry</label>
                <select name="company_industry" id="company_industry"
                    class="w-full mt-2 p-3 border border-gray-300 rounded">
                    <option value="">Select Industry</option>
                    @foreach ($industries as $industry)
                        <option value="{{ $industry }}" {{ Auth::user()->company_industry === $industry ? 'selected' : '' }}>
                            {{ $industry }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="company_contact" class="text-gray-700 font-medium">Company Contact</label>
                <input type="text" name="company_contact" id="company_contact"
                    value="{{ old('company_contact', Auth::user()->company_contact) }}"
                    class="w-full mt-2 p-3 border border-gray-300 rounded">
            </div>
        @endif

        <button type="submit"
            class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition font-semibold">
            Save Changes
        </button>
    </form>
</div>
@endsection
