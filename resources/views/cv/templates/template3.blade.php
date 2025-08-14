<div class="max-w-4xl mx-auto bg-white text-gray-900 grid grid-cols-1 md:grid-cols-3 shadow-lg">
    <aside class="bg-blue-800 text-white p-6 md:col-span-1">
        <h1 class="text-3xl font-bold mb-1">{{ $data['name'] }}</h1>
        <p class="mb-2">{{ $data['email'] }}</p>
        <p class="mb-2">{{ $data['phone'] }}</p>
        <p class="mb-4">{{ $data['address'] }}</p>
        @if(!empty($data['skills']))
        <div>
            <h2 class="font-semibold text-white text-lg mt-6 mb-2">Skills</h2>
            <ul class="list-disc list-inside text-sm">
                @foreach(explode(',', $data['skills']) as $skill)
                    <li>{{ trim($skill) }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </aside>
    <main class="p-6 md:col-span-2 space-y-6">
        @if(!empty($data['summary']))
        <section>
            <h2 class="text-xl font-bold text-blue-800 mb-2">Professional Summary</h2>
            <p class="text-gray-700">{{ $data['summary'] }}</p>
        </section>
        @endif

        @if(!empty($data['experience']))
        <section>
            <h2 class="text-xl font-bold text-blue-800 mb-2">Work Experience</h2>
            <p class="text-gray-700 whitespace-pre-line">{{ $data['experience'] }}</p>
        </section>
        @endif

        @if(!empty($data['education']))
        <section>
            <h2 class="text-xl font-bold text-blue-800 mb-2">Education</h2>
            <p class="text-gray-700 whitespace-pre-line">{{ $data['education'] }}</p>
        </section>
        @endif
    </main>
</div>
