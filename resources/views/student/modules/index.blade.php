@extends('layouts.main_student')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-left">
        Modul
    </h1>

    <!-- Grid yang lebih estetis -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
        @forelse ($moduls as $modul)
        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden transform transition-transform hover:scale-105 hover:shadow-2xl hover:border-500">
            <!-- Gambar (opsional) -->
            <div class="bg-blue-100 h-40 w-full flex items-center justify-center">
                <span class="text-blue-500 text-5xl font-bold">
                    {{ substr($modul->title, 0, 1) }} <!-- Huruf pertama dari modul -->
                </span>
            </div>
            <div class="p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4 truncate">
                    {{ $modul->title }}
                </h2>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    {{ Str::limit($modul->description, 100, '...') }}
                </p>
                <div class="flex justify-between items-center mt-6">
                    <span class="text-sm text-gray-500">
                        Order: {{ $modul->order_no }}
                    </span>
                    <a href="{{ route('student.moduls.show', $modul->id) }}"
                       class="inline-block bg-blue-600 text-white text-sm font-semibold px-5 py-2 rounded-lg shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-300 focus:ring-offset-2"
                       rel="noopener noreferrer"
                       aria-label="View details for {{ $modul->title }}">
                        View Details
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center">
            <p class="text-gray-600 text-lg">
                No modules available at the moment. Please check back later.
            </p>
        </div>
        @endforelse
    </div>
</div>
@endsection
