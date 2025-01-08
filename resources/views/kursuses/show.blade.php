@extends('layouts.main')

@section('content')

<div class="container mx-auto p-6">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('kursuses.index') }}" class="inline-block text-blue-600 hover:text-blue-800 font-medium text-sm">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Kursus
        </a>
    </div>

    <!-- Kursus Information -->
    <div class="bg-white shadow-xl rounded-lg p-8 mb-6">
        <h1 class="text-3xl font-extrabold text-gray-800">{{ $kursus->title }}</h1>
        <p class="text-sm text-gray-600 mt-2">Kategori: <span class="font-medium text-blue-600">{{ $kursus->category }}</span></p>
        <p class="text-sm text-gray-600 mt-1">Harga: <span class="font-medium text-green-600">Rp {{ number_format($kursus->price, 0, ',', '.') }}</span></p>
        <p class="mt-4 text-gray-700 text-lg">{{ $kursus->description }}</p>
    </div>

    <!-- Modul Kursus -->
    <div class="mt-8 bg-white shadow-xl rounded-lg p-8">
        <h2 class="text-2xl font-semibold text-gray-800">Modul Kursus</h2>
        @if ($modules && count($modules) > 0)
            <ul class="mt-6 space-y-4">
                @foreach ($modules as $module)
                    <li class="bg-gray-50 p-5 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                        <h3 class="text-gray-800 text-lg font-semibold">{{ $module->title }}</h3>
                        <p class="text-gray-600 text-sm mt-2">{{ $module->description }}</p>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-600 mt-4">Tidak ada modul yang tersedia untuk kursus ini.</p>
        @endif
    </div>

    <!-- Reviews Section -->
    <div class="mt-8 bg-white shadow-xl rounded-lg p-8">
        <h2 class="text-2xl font-semibold text-gray-800">Review</h2>
        @foreach ($reviews as $review)
            <div class="mt-6 p-5 bg-gray-50 rounded-lg border border-gray-200">
                <p class="text-sm text-gray-700"><strong>{{ $review->user->name }}</strong> (Rating: {{ $review->rating }})</p>
                <p class="text-gray-600 mt-2">{{ $review->comment }}</p>
            </div>
        @endforeach
    </div>

    <!-- Delete Kursus Button -->
    <div class="mt-8 text-center">
        <form class='inline-block' action="{{ route('kursuses.destroy', $kursus->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kursus ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-6 py-3 rounded-lg hover:bg-red-600 transition duration-300">
                Hapus Kursus
            </button>
        </form>
    </div>
</div>

@endsection
