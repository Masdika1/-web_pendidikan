@extends('layouts.main_student')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-left">User Review</h1>

    <!-- Success Alert -->
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 p-4 rounded-lg mb-6 flex items-center shadow-md">
            <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7 21h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <!-- Add Review Button -->
    <div class="flex justify-end mb-6">
        <a href="{{ route('reviews.create') }}"
           class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-3 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-200 ease-in-out">
            <svg class="w-5 h-5 inline-block mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Review
        </a>
    </div>

    <!-- Reviews Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($reviews as $review)
            <div class="bg-white shadow-lg rounded-xl overflow-hidden transform hover:scale-105 transition duration-200 ease-in-out">
                <div class="p-6">
                    <!-- Kursus Title -->
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $review->kursus->title }}</h3>

                    <!-- User Info -->
                    <p class="text-sm text-gray-600 mb-4">
                        <span class="font-medium text-gray-700">Oleh:</span> {{ $review->user->name }}
                    </p>

                    <!-- Rating -->
                    <div class="flex items-center mb-4">
                        <div class="flex space-x-1">
                            @for ($i = 0; $i < 5; $i++)
                                <svg class="w-5 h-5 {{ $i < $review->rating ? 'text-yellow-400' : 'text-gray-300' }}" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                            @endfor
                        </div>
                        <span class="ml-2 text-sm text-gray-500">({{ $review->rating }} / 5)</span>
                    </div>

                    <!-- Comment -->
                    <p class="text-sm text-gray-700 mb-6 italic">"{{ $review->comment }}"</p>

                    <!-- Actions -->
                    <div class="flex justify-between items-center">
                        <a href="{{ route('reviews.edit', $review->id) }}"
                           class="bg-yellow-400 text-white px-4 py-2 rounded-lg text-sm shadow hover:bg-yellow-500 transform hover:scale-105 transition duration-200 ease-in-out">
                            Edit
                        </a>
                        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-500 text-white px-4 py-2 rounded-lg text-sm shadow hover:bg-red-600 transform hover:scale-105 transition duration-200 ease-in-out"
                                    onclick="return confirm('Are you sure you want to delete this review?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500">No reviews found.</p>
        @endforelse
    </div>
</div>
@endsection
