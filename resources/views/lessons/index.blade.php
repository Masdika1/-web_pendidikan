@extends('layouts.main')

@section('title', 'Lessons List')

@section('content')
<div>
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800">Pelajaran</h2>
        <a href="{{ route('lessons.create') }}" class="px-6 py-3 bg-green-500 text-white rounded-full shadow-lg hover:shadow-xl hover:bg-green-600 transform hover:scale-200 transition-all">
            Tambah Pelajaran
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($lessons as $lesson)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-800">{{ $lesson->title }}</h3>
                <p class="text-gray-600 mt-2 text-sm">
                    {{ Str::limit($lesson->content, 100) }}
                </p>
                <p class="text-gray-500 mt-2 text-sm">
                    <strong>Module:</strong> {{ $lesson->module->title ?? 'N/A' }}
                </p>
                <p class="text-gray-500 mt-1 text-sm">
                    <strong>Order:</strong> {{ $lesson->order_no }}
                </p>
                <div class="mt-4 flex justify-between items-center">
                    <a href="{{ route('lessons.show', $lesson->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow-lg hover:shadow-xl hover:bg-blue-600 transform hover:scale-105 transition-all">Detail</a>
                    <div class="flex space-x-4">
                        <a href="{{ route('lessons.edit', $lesson->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg shadow-lg hover:shadow-xl hover:bg-yellow-600 transform hover:scale-105 transition-all">Edit</a>
                        <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg shadow-lg hover:shadow-xl hover:bg-red-600 transform hover:scale-105 transition-all">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p class="text-gray-600 text-center col-span-3">No lessons available. Please add some lessons!</p>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $lessons->links('pagination::tailwind') }}
    </div>
</div>
@endsection
