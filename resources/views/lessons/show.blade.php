@extends('layouts.main')

@section('title', 'Lesson Details')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <div class="bg-gradient-to-r from-white-500 to-gray-600 text-black rounded-lg shadow-lg p-6">
        <h2 class="text-4xl font-extrabold mb-4">{{ $lesson->title }}</h2>
        <p class="text-lg mb-2"><strong>Module:</strong> {{ $lesson->module->title ?? 'N/A' }}</p>
        <p class="text-lg mb-2"><strong>Order:</strong> {{ $lesson->order_no }}</p>
        <div class="mt-4 mb-4 p-4 bg-white text-gray-800 rounded-lg shadow-sm">
            <h4 class="text-xl font-semibold mb-2">Content:</h4>
            <p class="leading-relaxed">{{ $lesson->content }}</p>
        </div>
        <a href="{{ $lesson->video_url }}" target="_blank"
           class="inline-block bg-white-400 hover:bg-white-500 text-black font-semibold px-4 py-2 rounded-lg shadow mt-4">
           🎥 Watch Video
        </a>
    </div>

    <div class="mt-6 flex justify-between">
        <a href="{{ route('lessons.edit', $lesson->id) }}"
           class="px-6 py-3 bg-yellow-500 text-white rounded-lg shadow-lg hover:shadow-xl hover:bg-yellow-600 transform hover:scale-105 transition-all">
           ✏️ Edit Pelajaran
        </a>
        <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="px-6 py-3 bg-red-500 text-white rounded-lg shadow-lg hover:shadow-xl hover:bg-red-600 transform hover:scale-105 transition-all">
                🗑️ Delete Pelajaran
            </button>
        </form>
        <a href="{{ route('lessons.index') }}"
           class="px-6 py-3 bg-blue-500 text-white rounded-lg shadow-lg hover:shadow-xl hover:bg-blue-600 transform hover:scale-105 transition-all">
           ⬅️ Kembali
        </a>
    </div>
</div>
@endsection
