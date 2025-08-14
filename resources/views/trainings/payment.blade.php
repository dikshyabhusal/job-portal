@extends('layout.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-lg shadow">
    <h1 class="text-2xl font-bold text-green-700 mb-4">💳 Payment for {{ $application->session->title }}</h1>

    <p class="mb-6 text-gray-600">Please confirm your payment of <strong>Rs. {{ $application->session->fee }}</strong> for this training session.</p>

    {{-- Simulate eSewa Manual Payment --}}
    <form method="POST" action="{{ url('/trainings/payment/' . $application->id) }}">
        @csrf
        <p class="text-sm mb-4 text-gray-500">Note: This is a mock eSewa demo. You will be marked as "Paid" on clicking confirm.</p>
        <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">
            ✅ Confirm Payment
        </button>
    </form>
</div>
@endsection
