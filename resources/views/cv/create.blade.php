@extends('layout.app')
@section('title', 'Create Your CV')

@section('content')
<div class="max-w-5xl mx-auto py-12 px-6 bg-white rounded-lg shadow-lg mt-10 border border-blue-100">

    <h2 class="text-3xl font-bold text-blue-700 mb-8 text-center">📝 Build Your CV</h2>

    <form method="POST" action="{{ route('cv.store') }}" enctype="multipart/form-data" class="grid md:grid-cols-2 gap-6">
        @csrf

        
        @php
            $placeholders = [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'phone' => '+977-9812345678',
                'address' => 'Pokhara, Nepal',
                'education' => "BSc Computer Science, Tribhuvan University\n+2 Science, Prativa Secondary School",
                'experience' => "Frontend Developer at ABC Tech (2020-2023)\nIntern at XYZ Pvt Ltd",
                'skills' => "HTML, CSS, JavaScript, Laravel, Teamwork"
            ];
        @endphp

        {{-- Fields --}}
        @foreach(['name','email','phone','address','education','experience','skills'] as $field)
            <div class="col-span-1">
                <label for="{{ $field }}" class="block text-sm font-semibold text-gray-700 mb-1 capitalize">
                    {{ ucfirst($field) }}
                </label>
                @if(in_array($field,['education','experience','skills']))
                    <textarea id="{{ $field }}" name="{{ $field }}" rows="4"
                              placeholder="{{ $placeholders[$field] }}"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old($field) }}</textarea>
                @else
                    <input id="{{ $field }}" type="text" name="{{ $field }}" value="{{ old($field) }}"
                           placeholder="{{ $placeholders[$field] }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @endif
            </div>
        @endforeach

        {{-- Template Selection --}}
        <div class="md:col-span-2">
            <label for="template" class="block text-sm font-semibold text-gray-700 mb-1">🎨 Choose a CV Template</label>
            <select name="template" id="template"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm bg-white text-gray-800 focus:ring-2 focus:ring-orange-500">
                <option value="template1" selected>🧾 Classic (Professional Clean)</option>
                <option value="template2">📘 Modern (Minimalist)</option>
                <option value="template3">🎨 Creative (2-Column)</option>
            </select>
        </div>

        {{-- Submit --}}
        <div class="md:col-span-2 text-center mt-6">
            <button type="submit"
                    class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 font-semibold rounded-lg transition duration-300">
                🚀 Create & Preview CV
            </button>
        </div>
    </form>

    {{-- Live Template Preview --}}
    <div class="mt-12">
        <h3 class="text-xl font-bold text-gray-700 mb-4">👀 Live Template Preview</h3>
        <iframe id="cvPreviewFrame"
                src="{{ route('cv.preview', 'template1') }}"
                class="w-full h-[600px] border border-gray-300 rounded-lg shadow"
                frameborder="0">
        </iframe>
    </div>
</div>

{{-- Script to update preview on template change --}}
<script>
    const previewFrame = document.getElementById('cvPreviewFrame');
    const templateSelect = document.getElementById('template');

    templateSelect.addEventListener('change', function () {
        const selectedTemplate = this.value;
        previewFrame.src = "{{ url('/cv/preview') }}/" + selectedTemplate;
    });
</script>
@endsection
