@extends('layout.admin')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white rounded-2xl shadow-md p-8 border border-gray-200">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">
        Send Password Reset Link
    </h2>

    <form method="POST" action="{{ route('adminsend.verification.code') }}">
        @csrf

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 ease-in-out shadow">
            Send Reset Password Link
        </button>
    </form>
</div>
@endsection
