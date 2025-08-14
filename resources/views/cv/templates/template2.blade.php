<div class="max-w-3xl mx-auto p-10 bg-gray-100 text-gray-900">
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold">{{ $data['name'] }}</h1>
        <p class="text-gray-600">{{ $data['email'] }} • {{ $data['phone'] }}</p>
        <p class="text-gray-600">{{ $data['address'] }}</p>
    </div>

    @if(!empty($data['summary']))
    <div class="mb-6">
        <h2 class="uppercase tracking-wide text-sm font-bold text-gray-700 border-b pb-1 mb-2">Summary</h2>
        <p class="text-gray-800">{{ $data['summary'] }}</p>
    </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @if(!empty($data['experience']))
        <div>
            <h2 class="uppercase tracking-wide text-sm font-bold text-gray-700 border-b pb-1 mb-2">Experience</h2>
            <p class="text-gray-800 whitespace-pre-line">{{ $data['experience'] }}</p>
        </div>
        @endif

        @if(!empty($data['education']))
        <div>
            <h2 class="uppercase tracking-wide text-sm font-bold text-gray-700 border-b pb-1 mb-2">Education</h2>
            <p class="text-gray-800 whitespace-pre-line">{{ $data['education'] }}</p>
        </div>
        @endif
    </div>

    @if(!empty($data['skills']))
    <div class="mt-6">
        <h2 class="uppercase tracking-wide text-sm font-bold text-gray-700 border-b pb-1 mb-2">Skills</h2>
        <ul class="list-disc list-inside text-gray-800">
            @foreach(explode(',', $data['skills']) as $skill)
                <li>{{ trim($skill) }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
