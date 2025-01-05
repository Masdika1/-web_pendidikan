@extends('layouts.main_student')

@section('content')
<div class="max-w-4xl mt-6 mx-auto py-8 px-6 bg-white rounded-xl shadow-md">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Edit Review</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reviews.update', $review->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="mb-6 hidden">
            <label for="kursus_id" class="block text-sm font-medium text-gray-700">Course</label>
            <input type="text" id="kursus_id" name="kursus_id" value="{{ old('kursus_id', $review->kursus_id) }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-200 ease-in-out text-gray-600"
                   readonly>
        </div>

        <div class="mb-6">
            <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
            <input type="number" id="rating" name="rating" value="{{ old('rating', $review->rating) }}"
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 bg-gray-50 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                   min="1" max="5" required>
        </div>

        <div class="mb-6">
            <label for="comment" class="block text-sm font-medium text-gray-700">Comment</label>
            <textarea id="comment" name="comment" rows="4"
                      class="mt-1 block w-full px-4 py-2 border border-gray-300 bg-gray-50 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                      required>{{ old('comment', $review->comment) }}</textarea>
        </div>

        <div class="flex justify-between items-center">
            <button type="submit"
                    class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-200 ease-in-out">
                Update Review
            </button>
            <a href="{{ route('reviews.index') }}" class="text-blue-500 hover:text-blue-700 transition duration-200 ease-in-out text-lg">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
