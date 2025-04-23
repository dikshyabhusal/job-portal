@extends('layout.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Applications for Your Jobs</h2>

    @foreach ($jobs as $job)
        <div class="mb-8 p-6 bg-white rounded-lg shadow">
            <h3 class="text-xl font-semibold mb-4 text-gray-700">{{ $job->title }}</h3>

            @if($job->applications->count())
                <div class="overflow-x-auto">
                    <table class="table-auto w-full border border-gray-200 rounded">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700">
                                <th class="border px-4 py-3 text-left">Applicant Name</th>
                                <th class="border px-4 py-3 text-left">Email</th>
                                <th class="border px-4 py-3 text-left">Phone</th>
                                <th class="border px-4 py-3 text-left">Experience (years)</th>
                                <th class="border px-4 py-3 text-left">CV</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($job->applications as $application)
                            <tr class="hover:bg-gray-50">
                                <td class="border px-4 py-2">{{ $application->name }}</td>
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-500 mt-2">No applications yet for this job.</p>
            @endif
        </div>
    @endforeach
</div>
@endsection
