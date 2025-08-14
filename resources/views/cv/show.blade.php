@extends('layout.app')
@section('content')
<div class="max-w-4xl mx-auto py-10">
    <h2 class="text-2xl font-bold mb-4">Your CV Preview</h2>

    @if(!$cv)
      <p>No CV found. <a href="{{ route('cv.create') }}" class="text-blue-600">Create one now</a></p>
    @else
      @php $data = json_decode($cv->data,true); @endphp
      @include('cv.templates.' . $cv->template, ['data'=>$data])

      <div class="mt-6">
        <a href="{{ route('cv.download') }}" class="bg-green-600 text-white px-6 py-2 rounded">Download as PDF</a>
      </div>
    @endif
</div>
@endsection
