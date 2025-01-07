@extends('layouts.main_student')

@section('title', 'Kursus Tersedia')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-left">Kursus</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($kursuses as $kursus)
            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                <div class="p-6">
                    <!-- Course Title -->
                    <h2 class="text-xl font-bold text-gray-900 mb-2">{{ $kursus->title }}</h2>
                    <!-- Course Description -->
                    <p class="text-gray-600 text-sm">{{ Str::limit($kursus->description, 100) }}</p>
                    <!-- Course Price -->
                    <div class="mt-4">
                        <span class="block text-lg font-semibold text-green-600">Harga: Rp.{{ number_format($kursus->price, 2) }}</span>
                    </div>
                </div>
                <!-- Action Button -->
                <div class="bg-gray-100 px-6 py-4 flex justify-between items-center">
                    <a href="{{ route('student.kursuses.show', $kursus) }}" class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-2 rounded font-semibold shadow">
                        Beli Kursus
                    </a>
                    <span class="text-gray-400 text-xs">Instructor: {{ $kursus->instructor->name }}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
