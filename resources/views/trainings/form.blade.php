@extends('layout.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-lg shadow">
    <h1 class="text-2xl font-bold text-blue-600 mb-6">📝 Enroll in: {{ $session->title }}</h1>

    <form method="POST" action="{{ url('/trainings/enroll/' . $session->id) }}">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700">Full Name</label>
            <input type="text" name="name" required class="w-full p-2 border border-gray-300 rounded">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Phone</label>
            <input type="text" name="phone" required class="w-full p-2 border border-gray-300 rounded">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Address</label>
            <input type="text" name="address" required class="w-full p-2 border border-gray-300 rounded">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Preferred Time Slot (Optional)</label>
            <input type="text" name="time_slot" class="w-full p-2 border border-gray-300 rounded">
        </div>

        <button type="submit" class="w-full bg-orange-500 text-white py-2 rounded hover:bg-orange-600 transition">
            Proceed to Payment (Rs. {{ $session->fee }})
        </button>
    </form>
</div>
@endsection
