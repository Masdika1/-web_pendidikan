@extends('layouts.main_student')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <!-- Detail Kursus -->
    <div class="bg-white rounded-xl shadow-md p-6 mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            {{ $kursus->title }}
        </h1>
        <p class="text-gray-600 mt-4">
            {{ $kursus->description }}
        </p>
    </div>

    <!-- Daftar Modul -->
    <h2 class="text-2xl font-bold text-gray-800 mb-4">
        Modul Dalam Kursus
    </h2>
    @if($kursus->modules->isEmpty())
        <div class="text-center">
            <p class="text-gray-600">
                Belum ada modul yang tersedia untuk kursus ini.
            </p>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
            @foreach ($kursus->modules as $modul)
                <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden transform transition-transform hover:scale-105 hover:shadow-2xl hover:border-blue-500">
                    <!-- Bagian Gambar -->
                    <div class="bg-gradient-to-r from-blue-500 to-blue-300 h-40 w-full flex items-center justify-center">
                        <span class="text-white text-5xl font-bold">
                            {{ substr($modul->title, 0, 1) }}
                        </span>
                    </div>
                    <!-- Detail Modul -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 truncate">
                            {{ $modul->title }}
                        </h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            {{ Str::limit($modul->description, 100, '...') }}
                        </p>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">
                                Urutan: {{ $modul->order_no }}
                            </span>
                            <a href="{{ route('student.moduls.show', $modul->id) }}"
                               class="inline-block bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold px-5 py-2 rounded-lg shadow">
                                Lihat Modul
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
