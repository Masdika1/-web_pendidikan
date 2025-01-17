@extends('layouts.main_student')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">
        Kursus Saya
    </h1>

    <!-- Jika tidak ada kursus -->
    @if($purchasedCourses->isEmpty())
        <div class="text-center">
            <p class="text-gray-600 text-lg">
                Anda belum memiliki kursus yang dibeli. Silakan beli kursus untuk memulai pembelajaran.
            </p>
        </div>
    @else
        <!-- Grid Kursus -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
            @foreach ($purchasedCourses as $kursus)
                <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden transform transition-transform hover:scale-105 hover:shadow-2xl hover:border-blue-500">
                    <!-- Bagian Gambar -->
                    <div class="h-56 w-full bg-gray-200 overflow-hidden">
                        @if($kursus->picture)
                            <img src="{{ Storage::url($kursus->picture) }}" alt="{{ $kursus->title }}" class="w-full h-full object-cover">
                        @else
                            <img src="https://via.placeholder.com/400x250.png?text=No+Image" alt="No Image" class="w-full h-full object-cover">
                        @endif
                    </div>
                    <!-- Detail Kursus -->
                    <div class="p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4 truncate">
                            {{ $kursus->title }}
                        </h2>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            {{ Str::limit($kursus->description, 100, '...') }}
                        </p>
                        <a href="{{ route('student.kursusku.show', $kursus->id) }}"
                           class="inline-block bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold px-5 py-2 rounded-lg shadow">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
