<div class="container">
    <h2>Reset Password</h2>

    <div id="error-message" class="text-red-600"></div>

    <form id="verify-form">
        @csrf

        <div>
            <label>Verification Code</label>
            <input type="text" name="verification_code" id="verification_code" required>
        </div>

        <button type="button" onclick="verifyCode()">Verify Code</button>
    </form>

    <form method="POST" action="{{ route('user.update-password') }}" id="password-form" style="display: none;">
        @csrf

        <input type="hidden" name="verification_code" id="hidden_code">

        <div>
            <label>New Password</label>
            <input type="password" name="password" required>
        </div>

        <div>
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" required>
        </div>

        <button type="submit">Update Password</button>
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
