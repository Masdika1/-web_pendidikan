@extends('layouts.main')

@section('content')
<div class="container mx-auto py-10">
    <!-- Header Section -->
    <div class="text-center mb-10">
        <h1 class="text-4xl font-extrabold text-gray-800">🌟 Daftar Kursus Kami 🌟</h1>
        <p class="text-gray-600 text-lg mt-2">Temukan kursus terbaik yang sesuai dengan kebutuhan Anda</p>
    </div>

    <!-- Create Button -->
    <div class="flex justify-end mb-8">
        <a href="{{ route('kursuses.create') }}" class="px-6 py-3 bg-green-500 text-white font-semibold rounded-full shadow-md hover:bg-green-600 transition-all">
            Buat Kursus Baru
        </a>
    </div>

    <!-- Course Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($kursuses as $kursus)
        <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow overflow-hidden">
            <!-- Card Body -->
            <div class="h-56 w-full bg-gray-200 overflow-hidden">
                @if($kursus->picture)
                    <img src="{{ Storage::url($kursus->picture) }}" alt="{{ $kursus->title }}" class="w-full h-full object-cover">
                @else
                    <img src="https://via.placeholder.com/400x250.png?text=No+Image" alt="No Image" class="w-full h-full object-cover">
                @endif
                </div>
            <div class="p-6">
                <!-- Title -->
                <h3 class="text-xl font-bold text-blue-600">{{ $kursus->title }}</h3>

                <!-- Description -->
                <p class="text-gray-600 mt-3">{{ Str::limit($kursus->description, 100) }}</p>

                <!-- Category -->
                <span class="inline-block bg-green-100 text-green-800 text-sm font-medium mt-4 px-3 py-1 rounded-full">
                    Kategori: {{ $kursus->category }}
                </span>

                <!-- Price -->
                <p class="text-pink-600 font-bold text-lg mt-4">
                    Rp {{ number_format($kursus->price, 0, ',', '.') }}
                </p>

                <!-- Detail Button -->
                <a href="{{ route('kursuses.show', $kursus->id) }}"
                   class="block text-center mt-6 px-4 py-2 bg-blue-500 text-white font-medium rounded-full hover:bg-blue-600 transition-all">
                    Lihat Detail
                </a>

                <!-- Edit Button -->
                <a href="{{ route('kursuses.edit', $kursus->id) }}"
                   class="block text-center mt-4 px-4 py-2 bg-yellow-500 text-white font-medium rounded-full hover:bg-yellow-600 transition-all">
                    Edit Kursus
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
