@extends('layout.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Contact Us</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.submit') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block font-medium mb-1">Name</label>
                <input type="text" name="name" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Email</label>
                <input type="email" name="email" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Subject</label>
                <input type="text" name="subject" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="mb-6">
                <label class="block font-medium mb-1">Message</label>
                <textarea name="message" rows="4" class="w-full border px-3 py-2 rounded" required></textarea>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                Send Message
            </button>
        </form>
    </div>
</div>
@endsection
