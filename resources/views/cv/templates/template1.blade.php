<div class="max-w-3xl mx-auto p-10 bg-white text-gray-800">
    <h1 class="text-4xl font-bold text-blue-700 mb-1">{{ $data['name'] }}</h1>
    <p class="text-gray-600 mb-4">{{ $data['email'] }} | {{ $data['phone'] }} | {{ $data['address'] }}</p>
    
    <hr class="my-6">

    @if(!empty($data['summary']))
    <section class="mb-6">
        <h2 class="text-xl font-semibold text-gray-800 border-b pb-1 mb-2">Professional Summary</h2>
        <p class="text-gray-700">{{ $data['summary'] }}</p>
    </section>
    @endif

    @if(!empty($data['experience']))
    <section class="mb-6">
        <h2 class="text-xl font-semibold text-gray-800 border-b pb-1 mb-2">Work Experience</h2>
        <p class="text-gray-700 whitespace-pre-line">{{ $data['experience'] }}</p>
    </section>
    @endif

    @if(!empty($data['education']))
    <section class="mb-6">
        <h2 class="text-xl font-semibold text-gray-800 border-b pb-1 mb-2">Education</h2>
        <p class="text-gray-700 whitespace-pre-line">{{ $data['education'] }}</p>
    </section>
    @endif

    @if(!empty($data['skills']))
    <section>
        <h2 class="text-xl font-semibold text-gray-800 border-b pb-1 mb-2">Skills</h2>
        <p class="text-gray-700">{{ $data['skills'] }}</p>
    </section>
    @endif
</div>
