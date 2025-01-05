@extends('layouts.main')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Create Certificate</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc pl-6">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('certificates.store') }}" method="POST" class="bg-white shadow-md rounded p-6">
        @csrf
        <div class="mb-4">
            <label for="enrollment_id" class="block text-gray-700 font-medium mb-2">Enrollment</label>
            <select id="enrollment_id" name="enrollment_id" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="" selected disabled>Select an enrollment</option>
                @foreach ($enrollments as $enrollment)
                    <option value="{{ $enrollment->id }}">
                        {{ $enrollment->user->name }} - {{ $enrollment->kursus->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="certificate_code" class="block text-gray-700 font-medium mb-2">Certificate Code</label>
            <input type="text" id="certificate_code" name="certificate_code" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Save Certificate
            </button>
            <a href="{{ route('certificates.index') }}" class="ml-2 text-gray-500 hover:underline">Cancel</a>
        </div>
    </form>
</div>
@endsection
