@extends('layouts.main_student')

@section('content')
<div class="max-w-3xl mx-auto py-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Tambah Review</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reviews.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Course Selection -->
            <div>
                <label for="kursus_id" class="block text-sm font-medium text-gray-700">Pilih Kursus</label>
                <select id="kursus_id" name="kursus_id"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 bg-gray-50 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @foreach($kursuses as $kursus)
                        <option value="{{ $kursus->id }}">{{ $kursus->title }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Rating -->
            <div>
                <label for="rating" class="block text-sm font-medium text-gray-700">Rating (1-5)</label>
                <input type="number" id="rating" name="rating" value="{{ old('rating') }}"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 bg-gray-50 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                       min="1" max="5" required>
            </div>

            <!-- Comment -->
            <div>
                <label for="comment" class="block text-sm font-medium text-gray-700">Comment</label>
                <textarea id="comment" name="comment" rows="4"
                          class="mt-1 block w-full px-4 py-2 border border-gray-300 bg-gray-50 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                          placeholder="Write your review here..." required>{{ old('comment') }}</textarea>
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-between">
                <button type="submit"
                        class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-medium rounded-lg shadow-sm hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Submit Review
                </button>
                <a href="{{ route('reviews.index') }}"
                   class="text-blue-600 hover:underline">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
