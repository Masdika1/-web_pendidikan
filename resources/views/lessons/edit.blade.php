@extends('layouts.main')

@section('title', 'Edit Lesson')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Edit Lesson</h2>

    <form action="{{ route('lessons.update', $lesson->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label for="title" class="block text-lg font-semibold text-gray-700 mb-2">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $lesson->title) }}"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm">
        </div>

        <div class="mb-6">
            <label for="content" class="block text-lg font-semibold text-gray-700 mb-2">Content</label>
            <textarea name="content" id="content" rows="4"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm">{{ old('content', $lesson->content) }}</textarea>
        </div>

        <div class="mb-6">
            <label for="module_id" class="block text-lg font-semibold text-gray-700 mb-2">Module</label>
            <select name="module_id" id="module_id"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                <option value="">Pilih Modul</option>
                @foreach($modules as $module)
                <option value="{{ $module->id }}" {{ $lesson->module_id == $module->id ? 'selected' : '' }}>
                    {{ $module->title }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-6">
            <label for="order_no" class="block text-lg font-semibold text-gray-700 mb-2">Order</label>
            <input type="number" name="order_no" id="order_no" value="{{ old('order_no', $lesson->order_no) }}"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm">
        </div>

        <div class="mb-6">
            <label for="video_url" class="block text-lg font-semibold text-gray-700 mb-2">Video URL</label>
            <input type="text" name="video_url" id="video_url" value="{{ old('video_url', $lesson->video_url) }}"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm">
        </div>

        <div class="flex justify-between items-center mt-8">
            <button type="submit"
                    class="px-6 py-3 bg-green-500 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl hover:bg-green-600 transform hover:scale-105 transition-all">
                💾 Simpan
            </button>
            <a href="{{ route('lessons.index') }}"
               class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl hover:bg-blue-600 transform hover:scale-105 transition-all">Kembali</a>
        </div>
    </form>
</div>
@endsection
