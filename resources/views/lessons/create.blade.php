@extends('layouts.main')

@section('title', 'Create Lesson')

@section('content')
<div class="bg-white shadow-lg rounded-lg p-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Create New Lesson</h2>
    <form action="{{ route('lessons.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="module_id" class="block text-gray-600 font-medium">Module ID</label>
            <input type="number" name="module_id" id="module_id"
                   class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                   required>
        </div>

        <div>
            <label for="title" class="block text-gray-600 font-medium">Title</label>
            <input type="text" name="title" id="title"
                   class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                   required>
        </div>

        <div>
            <label for="content" class="block text-gray-600 font-medium">Content</label>
            <textarea name="content" id="content" rows="4"
                      class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                      required></textarea>
        </div>

        <div>
            <label for="video_url" class="block text-gray-600 font-medium">Video URL</label>
            <input type="url" name="video_url" id="video_url"
                   class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <div>
            <label for="order_no" class="block text-gray-600 font-medium">Order</label>
            <input type="number" name="order_no" id="order_no"
                   class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                   required>
        </div>

        <div class="flex justify-between items-center">
            <button type="submit"
                    class="px-4 py-2 bg-green-500 text-white rounded-lg shadow-lg hover:shadow-xl hover:bg-green-600 transform hover:scale-105 transition-all">
                Save
            </button>
            <a href="{{ route('lessons.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow-lg hover:shadow-xl hover:bg-blue-600 transform hover:scale-105 transition-all">Cancel</a>
        </div>
    </form>
</div>
@endsection
