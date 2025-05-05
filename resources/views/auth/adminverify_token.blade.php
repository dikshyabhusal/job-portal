@extends('layout.admin')

@section('content')
<div class="max-w-lg mx-auto mt-12 bg-white p-8 rounded-2xl shadow-lg">
    <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Reset Password</h2>

    <div id="error-message" class="text-red-600 text-center mb-4"></div>

    <!-- Verification Form -->
    <form id="verify-form" class="space-y-4">
        @csrf
        <div>
            <label for="verification_code" class="block text-sm font-medium text-gray-700">Verification Code</label>
            <input type="text" name="verification_code" id="verification_code" required
                class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <button type="button" onclick="verifyCode()"
            class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-200">
            Verify Code
        </button>
    </form>

    <!-- Password Update Form -->
    <form method="POST" action="{{ route('admin.update-password') }}" id="password-form" style="display: none;" class="mt-6 space-y-4">
        @csrf
        <input type="hidden" name="verification_code" id="hidden_code">

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
            <input type="password" name="password" id="password" required
                class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required
                class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <button type="submit"
            class="w-full bg-green-600 text-white font-semibold py-2 rounded-lg hover:bg-green-700 transition duration-200">
            Update Password
        </button>
    </form>
</div>

<script>
    function verifyCode() {
        var code = document.getElementById('verification_code').value;
        var token = document.querySelector('input[name="_token"]').value;

        fetch("{{ route('user.verify-code') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": token
            },
            body: JSON.stringify({
                verification_code: code
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('password-form').style.display = 'block';
                document.getElementById('verify-form').style.display = 'none';
                document.getElementById('hidden_code').value = code;
            } else {
                document.getElementById('error-message').innerText = data.message;
            }
        });
    }
</script>
@endsection
