<h2>Verify Token</h2>

@if(session('status'))
    <div style="color: green;">{{ session('status') }}</div>
@endif
@if($errors->any())
    <div style="color: red; margin-bottom: 15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ route('verify.token') }}" method="POST">
    @csrf
    <input type="hidden" name="email" value="{{ request()->get('email') }}">
    <input type="text" name="token" placeholder="Enter token" required>
    <button type="submit">Verify Token</button>
</form>

<form action="{{ route('send.token.again') }}" method="POST" style="margin-top: 20px;">
    @csrf
    <input type="hidden" name="email" value="{{ request()->get('email') }}">
    <button type="submit">Send Again</button>
</form>
