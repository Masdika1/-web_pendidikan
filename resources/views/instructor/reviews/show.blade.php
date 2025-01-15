@extends('layouts.main_instructor')

@section('content')
<div class="max-w-4xl mx-auto mt-10 p-10 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Detail Ulasan</h1>

    <!-- Ulasan Details -->
    <div class="space-y-6">
        <!-- Profil Peserta -->
        <div class="flex items-center space-x-4">
            <img src="{{ $review->user->profile_picture ? asset('storage/' . $review->user->profile_picture) : asset('images/default-profile.png') }}"
                 alt="Foto Profil"
                 class="w-16 h-16 rounded-full shadow-md object-cover">
            <div>
                <p class="text-gray-600 text-sm font-medium">Nama Peserta</p>
                <p class="text-lg font-semibold text-gray-800">{{ $review->user->name }}</p>
            </div>
        </div>

        <!-- Kursus -->
        <div>
            <p class="text-gray-600 text-sm font-medium">Judul Kursus</p>
            <p class="text-lg font-semibold text-gray-800">{{ $review->kursus->title }}</p>
        </div>

        <!-- Rating -->
        <div>
            <p class="text-gray-600 text-sm font-medium">Rating</p>
            <div class="flex items-center space-x-2">
                <div class="flex space-x-1">
                    @for ($i = 0; $i < 5; $i++)
                        <svg class="w-6 h-6 {{ $i < $review->rating ? 'text-yellow-400' : 'text-gray-300' }}" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                    @endfor
                </div>
                <span class="text-lg font-semibold text-gray-800">({{ $review->rating }} / 5)</span>
            </div>
        </div>

        <!-- Ulasan -->
        <div>
            <p class="text-gray-600 text-sm font-medium">Ulasan</p>
            <p class="text-lg font-normal text-gray-800 italic">"{{ $review->comment }}"</p>
        </div>
    </div>

    <!-- Actions -->
    <div class="flex justify-end mt-8 space-x-4">
        <a href="{{ route('instructor.reviews.index') }}"
           class="px-6 py-3 bg-gray-100 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-200 transition ease-in-out duration-150">
            Kembali
        </a>
        <form action="{{ route('instructor.reviews.destroy', $review->id) }}" method="POST"
              onsubmit="return confirm('Yakin ingin menghapus ulasan ini?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="px-6 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition ease-in-out duration-150">
                Hapus Ulasan
            </button>
        </form>
    </div>
</div>
@endsection
