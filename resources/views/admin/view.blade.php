@extends('layout.admin')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">Job Details</h2>
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="w-full text-left text-gray-600">
            <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                <tr>
                    <th class="px-6 py-3">Title</th>
                    <th class="px-6 py-3">Location</th>
                    <th class="px-6 py-3">Description</th>
                    <th class="px-6 py-3">Salary</th>
                    <th class="px-6 py-3">Company</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-800">{{ $job->title }}</td>
                        <td class="px-6 py-4">{{ $job->location }}</td>
                        <td class="px-6 py-4">{{ $job->description }}</td>
                        <td class="px-6 py-4">{{ $job->salary }}</td>
                        <td class="px-6 py-4">{{ $job->company }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
