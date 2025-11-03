<div class="max-w-3xl mx-auto p-10 bg-white shadow-lg rounded-lg text-gray-800">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-4xl font-bold text-blue-700">{{ $data['name'] }}</h1>
            <p class="text-gray-600">{{ $data['email'] }} | {{ $data['phone'] }} | {{ $data['address'] }}</p>
        </div>
        <div class="w-24 h-24 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-bold text-xl">
            {{ strtoupper(substr($data['name'],0,2)) }}
        </div>
    </div>

    <hr class="border-gray-300 mb-6">

    @if(!empty($data['summary']))
    <section class="mb-6">
        <h2 class="text-xl font-semibold text-blue-700 mb-2 border-b-2 border-blue-200 pb-1">Professional Summary</h2>
        <p class="text-gray-700 whitespace-pre-line">{{ $data['summary'] }}</p>
    </section>
    @endif

    <div class="grid md:grid-cols-2 gap-6">
        @if(!empty($data['experience']))
        <section>
            <h2 class="text-xl font-semibold text-blue-700 mb-2 border-b-2 border-blue-200 pb-1">Work Experience</h2>
            <p class="text-gray-700 whitespace-pre-line">{{ $data['experience'] }}</p>
        </section>
        @endif

        @if(!empty($data['education']))
        <section>
            <h2 class="text-xl font-semibold text-blue-700 mb-2 border-b-2 border-blue-200 pb-1">Education</h2>
            <p class="text-gray-700 whitespace-pre-line">{{ $data['education'] }}</p>
        </section>
        @endif
    </div>

    @if(!empty($data['skills']))
    <section class="mt-6">
        <h2 class="text-xl font-semibold text-blue-700 mb-2 border-b-2 border-blue-200 pb-1">Skills</h2>
        <p class="text-gray-700">{{ $data['skills'] }}</p>
    </section>
    @endif
</div>
