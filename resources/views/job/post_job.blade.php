<!-- resources/views/post_job.blade.php -->
@extends('layout.app') <!-- Assuming you have a base layout -->

@section('content')
    <div class="max-w-3xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-6">
        <h1 class="text-2xl font-semibold text-center mb-6">Post a Job</h1>

        <!-- Display success message if any -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 mb-6 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Job Posting Form -->
        <form action="{{ route('store.job') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-medium mb-2">Job Title</label>
                <input type="text" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" id="title" name="title" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-medium mb-2">Job Description</label>
                <textarea class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" id="description" name="description" rows="4" required></textarea>
            </div>

            <div class="mb-4">
                <label for="location" class="block text-gray-700 text-sm font-medium mb-2">Job Location</label>
                <input type="text" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" id="location" name="location" required>
            </div>

            <div class="mb-4">
                <label for="salary" class="block text-gray-700 text-sm font-medium mb-2">Salary</label>
                <input type="number" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" id="salary" name="salary" required>
            </div>

            <div class="mb-4">
                <label for="company" class="block text-gray-700 text-sm font-medium mb-2">Company</label>
                <input type="text" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" id="company" name="company" required>
            </div>

            <button type="submit" class="w-full p-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition duration-200">Post Job</button>
        </form>
    </div>
@endsection
