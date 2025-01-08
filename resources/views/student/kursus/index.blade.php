@extends('layouts.main_student')

@section('title', 'Kursus Tersedia')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-left">Kursus Tersedia</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
        @forelse($kursuses as $kursus)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-shadow duration-300 hover:shadow-xl flex flex-col h-full">
                <div class="h-56 w-full bg-gray-200 overflow-hidden">
                @if($kursus->picture)
                    <img src="{{ Storage::url($kursus->picture) }}" alt="{{ $kursus->title }}" class="w-full h-full object-cover">
                @else
                    <img src="https://via.placeholder.com/400x250.png?text=No+Image" alt="No Image" class="w-full h-full object-cover">
                @endif
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4 hover:text-blue-600 transition">{{ $kursus->title }}</h2>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($kursus->description, 80) }}</p>
                    <div class="mt-auto">
                        <span class="block text-xl font-semibold text-green-600">Rp.{{ number_format($kursus->price, 2) }}</span>
                    </div>
                </div>
                <div class="bg-gray-50 px-6 py-4 flex justify-between items-center gap-4">
                    <a href="{{ route('student.kursuses.show', $kursus) }}"
                       class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-5 py-2 rounded-lg font-semibold shadow-md transition duration-200 ease-in-out">
                        Beli Kursus
                    </a>
                    <span class="text-gray-500 text-xs text-right">Instructor: {{ $kursus->instructor->name ?? 'Tidak Diketahui' }}</span>
                </div>
            </div>
        @empty
            <p class="text-gray-600">Tidak ada kursus yang tersedia saat ini.</p>
        @endforelse
    </div>
</div>
@endsection
