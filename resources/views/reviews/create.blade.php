@extends('layouts.main_student')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-6">Add Review</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reviews.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="kursus_id" class="block text-gray-700 font-bold">Course</label>
            <select id="kursus_id" name="kursus_id"
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300">
                @foreach($kursuses as $kursus)
                <option value="{{ $kursus->id }}">{{ $kursus->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="rating" class="block text-gray-700 font-bold">Rating</label>
            <input type="number" id="rating" name="rating" value="{{ old('rating') }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300"
                   min="1" max="5" required>
        </div>

        <div class="mb-4">
            <label for="comment" class="block text-gray-700 font-bold">Comment</label>
            <textarea id="comment" name="comment" rows="4"
                      class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300"
                      required>{{ old('comment') }}</textarea>
        </div>

        <div>
            <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit</button>
            <a href="{{ route('reviews.index') }}" class="text-blue-500 hover:underline">Cancel</a>
        </div>
    </form>
</div>
@endsection
