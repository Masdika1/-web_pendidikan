@extends('layouts.main_student')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold text-gray-800 mb-8">Reviews</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('reviews.create') }}"
           class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200 ease-in-out">
            Tambah Review
        </a>
    </div>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead class="bg-gray-200 text-left">
                <tr>
                    <th class="border border-gray-300 text-center px-4 py-3 text-sm font-medium text-gray-700">ID</th>
                    <th class="border border-gray-300 px-4 py-3 text-sm font-medium text-gray-700">Kursus</th>
                    <th class="border border-gray-300 px-4 py-3 text-sm font-medium text-gray-700">User</th>
                    <th class="border border-gray-300 text-center px-4 py-3 text-sm font-medium text-gray-700">Rating</th>
                    <th class="border border-gray-300 px-4 py-3 text-sm font-medium text-gray-700">Comment</th>
                    <th class="border border-gray-300 text-center px-4 py-3 text-sm font-medium text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reviews as $review)
                    <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                        <td class="border border-gray-300 text-center px-4 py-3 text-sm text-gray-800">{{ $review->id }}</td>
                        <td class="border border-gray-300 px-4 py-3 text-sm text-gray-800">{{ $review->kursus->title }}</td>
                        <td class="border border-gray-300 px-4 py-3 text-sm text-gray-800">{{ $review->user->name }}</td>
                        <td class="border border-gray-300 text-center px-4 py-3 text-sm text-gray-800">{{ $review->rating }}</td>
                        <td class="border border-gray-300 px-4 py-3 text-sm text-gray-800">{{ $review->comment }}</td>
                        <td class="border border-gray-300 justify-center px-4 py-3 flex space-x-2">
                            <a href="{{ route('reviews.edit', $review->id) }}"
                               class="bg-yellow-500 text-white px-4 py-2 rounded-lg text-sm hover:bg-yellow-600 transition duration-200 ease-in-out">
                                Edit
                            </a>
                            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-500 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-600 transition duration-200 ease-in-out"
                                        onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="border border-gray-300 px-4 py-3 text-center text-sm text-gray-500">
                            No reviews found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
