@extends('layout.admin')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
    <h2 class="text-2xl font-bold text-blue-800 mb-6">User Roles</h2>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-blue-200">
            <thead class="bg-gradient-to-r from-blue-600 to-orange-500 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Roles</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-blue-100">
                @foreach ($users as $user)
                <tr class="hover:bg-orange-50 transition">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-900">{{ $user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-800">{{ $user->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @foreach ($user->roles as $role)
                            <span class="inline-block bg-orange-500 text-white text-xs px-3 py-1 rounded-full mr-1 mb-1">
                                {{ $role->name }}
                            </span>
                        @endforeach
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
