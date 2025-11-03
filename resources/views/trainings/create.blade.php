@extends('layout.admin')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-orange-100 via-white to-blue-100 flex items-center justify-center p-6">
        <div class="bg-white shadow-xl rounded-2xl w-full max-w-2xl p-8">
            <h2 class="text-3xl font-bold text-center mb-6 text-blue-700">Add New Training</h2>

            @if(session('success'))
                <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('trainings.store') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Title -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
                    @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" rows="3"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500">{{ old('description') }}</textarea>
                    @error('description') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <!-- Category -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Category</label>
                    <input type="text" name="category" value="{{ old('category') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
                    @error('category') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <!-- Dates -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Start Date</label>
                        <input type="date" name="start_date" value="{{ old('start_date') }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500">
                        @error('start_date') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">End Date</label>
                        <input type="date" name="end_date" value="{{ old('end_date') }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
                        @error('end_date') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Fee -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Fee</label>
                    <input type="number" name="fee" value="{{ old('fee', 500) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500">
                    @error('fee') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit"
                        class="bg-gradient-to-r from-orange-500 to-blue-600 text-white font-bold px-6 py-3 rounded-lg shadow-lg hover:scale-105 transition-transform">
                        Save Training
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
