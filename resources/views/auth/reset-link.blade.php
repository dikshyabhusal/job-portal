<form method="POST" action="{{ route('send.verification.code') }}">
    @csrf
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
        Send Reset Password Link
    </button>
</form>