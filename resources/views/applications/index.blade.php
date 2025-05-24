@extends('layout.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">My Job Applications</h2>

    <div class="overflow-x-auto">
        <table class="table-auto w-full border border-gray-200 rounded">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="border px-4 py-3 text-left">Applicant Name</th>
                    <th class="border px-4 py-3 text-left">Job Title</th>
                    <th class="border px-4 py-3 text-left">Email</th>
                    <th class="border px-4 py-3 text-left">Phone</th>
                    <th class="border px-4 py-3 text-left">Experience (years)</th>
                    <th class="border px-4 py-3 text-left">CV</th>
                    <th class="border px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applications as $application)
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2">{{ $application->name }}</td>
                    <td class="border px-4 py-2">{{ $application->job->title }}</td>
                    <td class="border px-4 py-2">{{ $application->email }}</td>
                    <td class="border px-4 py-2">{{ $application->phone }}</td>
                    <td class="border px-4 py-2">{{ $application->years_of_experience }}</td>
                    <td class="border px-4 py-2">
                        @if($application->cv)
                            <a href="{{ asset('storage/'.$application->cv) }}" class="text-blue-600 hover:underline" target="_blank">View CV</a>
                        @else
                            <span class="text-gray-500">N/A</span>
                        @endif
                    </td>
                    <td class="border px-4 py-2 space-x-2">
                        @if(is_null($application->status))
                            <form action="{{ route('applications.accept', $application->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Accept</button>
                            </form>
                            <form action="{{ route('applications.reject', $application->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Reject</button>
                            </form>
                        @else
                            <span class="text-sm font-semibold {{ $application->status == 'accepted' ? 'text-green-600' : 'text-red-600' }}">
                                {{ ucfirst($application->status) }}
                            </span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
