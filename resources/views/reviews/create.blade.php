@extends('layouts.main_student')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Add Review</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc pl-6">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reviews.store') }}" method="POST" class="bg-white shadow-md rounded p-6">
        @csrf
        <div class="mb-4">
            <label for="kursus_id" class="block text-gray-700 font-medium mb-2">Kursus</label>
            <select id="kursus_id" name="kursus_id" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="" selected disabled>Select a kursus</option>
                @foreach ($kursuses as $kursus)
                    <option value="{{ $kursus->id }}">{{ $kursus->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="user_id" class="block text-gray-700 font-medium mb-2">User</label>
            <select id="user_id" name="user_id" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="" selected disabled>Select a user</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="rating" class="block text-gray-700 font-medium mb-2">Rating</label>
            <input type="number" id="rating" name="rating" min="1" max="5" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="comment" class="block text-gray-700 font-medium mb-2">Comment</label>
            <textarea id="comment" name="comment" rows="4" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>

        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Save Review
            </button>
            <a href="{{ route('reviews.index') }}" class="ml-2 text-gray-500 hover:underline">Cancel</a>
        </div>
    </form>
</div>
@endsection
