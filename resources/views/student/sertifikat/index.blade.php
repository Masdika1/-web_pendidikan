@extends('layouts.main_student')

@section('content')
<div class="container mx-auto mt-8">
    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-left">Sertifikat</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($certificates as $certificate)
                @php
                    $kursus = $certificate->enrollment->kursus;
                @endphp
                <div class="bg-gradient-to-br from-white to-gray-100 border border-gray-200 rounded-lg overflow-hidden shadow-lg transform hover:scale-105 hover:shadow-2xl transition-transform duration-300 ease-in-out">
                    <div class="h-56 w-full bg-gray-200 overflow-hidden">
                        @if($kursus->picture)
                            <img src="{{ Storage::url($kursus->picture) }}" alt="{{ $kursus->title }}" class="w-full h-full object-cover">
                        @else
                            <img src="https://via.placeholder.com/400x250.png?text=No+Image" alt="No Image" class="w-full h-full object-cover">
                        @endif
                    </div>
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-3 truncate">
                            {{ $kursus->title }}
                        </h2>
                        <p class="text-gray-600 mb-4">
                            <span class="font-semibold">Nama:</span> {{ $certificate->enrollment->user->name }}
                        </p>
                        <p class="text-gray-600 mb-6">
                            <span class="font-semibold">Kode Sertifikat:</span> <span class="text-blue-600">{{ $certificate->certificate_code }}</span>
                        </p>
                        <a href="{{ route('student.sertifikat.show', $certificate->id) }}"
                           class="block bg-blue-500 hover:bg-blue-600 text-white text-center font-semibold text-sm px-4 py-2 rounded-lg shadow-lg transition duration-300 ease-in-out">
                            Lihat Detail Sertifikat
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center">
                    <p class="text-gray-600 text-lg">Anda belum memiliki sertifikat. Selesaikan kursus untuk mendapatkan sertifikat!</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
