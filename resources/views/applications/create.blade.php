@extends('layout.app')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4">Apply for {{ $job->title }}</h2>

    <form method="POST" action="{{ route('applications.store') }}" enctype="multipart/form-data" class="space-y-4">
                @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        @csrf
        <input type="hidden" name="job_id" value="{{ $job->id }}">

        <div>
            <label class="block text-gray-700">Name</label>
            <input type="text" name="name" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block text-gray-700">Phone</label>
            <input type="text" name="phone" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block text-gray-700">Years of Experience</label>
            <select name="years_of_experience" class="w-full border rounded p-2" required>
                <option value="">Select years</option>
                @for ($i = 0; $i <= 50; $i++)
                    <option value="{{ $i }}">{{ $i }} year{{ $i !== 1 ? 's' : '' }}</option>
                @endfor
            </select>
        </div>

        <div>
            <label class="block text-gray-700">Cover Letter (optional)</label>
            <textarea name="cover_letter" rows="4" class="w-full border rounded p-2"></textarea>
        </div>

        <div>
            <label class="block text-gray-700">Upload CV (PDF, DOC, DOCX)</label>
            <input type="file" name="cv" accept=".pdf,.doc,.docx" class="w-full border rounded p-2">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Submit Application</button>
    </form>
</div>
@endsection
