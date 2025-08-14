<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Training Token</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        .box { border: 2px solid #333; padding: 20px; width: 100%; max-width: 600px; margin: auto; }
        .header { text-align: center; margin-bottom: 20px; }
        .stamp { text-align: right; margin-top: 40px; }
        .bold { font-weight: bold; }
    </style>
</head>
<body>
    <div class="box">
        <div class="header">
            <h2>🧾 Job Portal Training Registration Bill</h2>
            <p><strong>Token No:</strong> TKN-{{ str_pad($application->id, 5, '0', STR_PAD_LEFT) }}</p>
        </div>

        <p><span class="bold">Name:</span> {{ $application->name }}</p>
        <p><span class="bold">Phone:</span> {{ $application->phone }}</p>
        <p><span class="bold">Address:</span> {{ $application->address }}</p>
        <p><span class="bold">Session:</span> {{ $application->session->title }}</p>
        <p><span class="bold">Start Date:</span> {{ \Carbon\Carbon::parse($application->session->start_date)->format('M d, Y') }}</p>
        <p><span class="bold">Amount Paid:</span> Rs. {{ $application->session->fee }}</p>
        <p><span class="bold">Status:</span> Paid ✅</p>

        <div class="stamp">
            <img src="{{ public_path('images/stamp.png') }}" alt="Stamp" width="100"><br>
            <small>Job Seeker Training Department</small>
        </div>
    </div>
</body>
</html>
