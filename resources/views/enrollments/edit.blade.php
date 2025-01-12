@extends('layouts.main')

@section('title', 'Edit Enrollment')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-blue-600 text-center mb-8">Edit Enrollment</h1>

    <form action="{{ route('enrollments.update', $enrollment->id) }}" method="POST" class="bg-white border rounded-lg shadow-lg p-6">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label for="course_id" class="block text-sm font-medium text-gray-700">Kursus</label>
            <select id="course_id" name="course_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg">
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ $enrollment->course_id == $course->id ? 'selected' : '' }}>
                        {{ $course->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-6">
            <label for="user_id" class="block text-sm font-medium text-gray-700">Siswa</label>
            <select id="user_id" name="user_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg">
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" {{ $enrollment->user_id == $student->id ? 'selected' : '' }}>
                        {{ $student->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">Perbarui</button>
        <a href="{{ route('enrollments.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600">Batal</a>
    </form>
</div>
@endsection
