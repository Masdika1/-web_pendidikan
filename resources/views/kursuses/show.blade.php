@extends('layouts.main')

@section('content')

<div class="container mx-auto p-6">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800">{{ $kursus->title }}</h1>
        <p class="text-sm text-gray-600 mt-2">Kategori: <span class="font-medium">{{ $kursus->category }}</span></p>
        <p class="text-sm text-gray-600 mt-1">Harga: <span class="font-medium">Rp {{ number_format($kursus->price, 0, ',', '.') }}</span></p>
        <p class="mt-4 text-gray-700">{{ $kursus->description }}</p>
    </div>
    <div class="mt-8">
        <h2 class="text-xl font-semibold text-gray-800">Modul Kursus</h2>
        @if ($modules && count($modules) > 0)
            <ul class="mt-4 space-y-3">
                @foreach ($modules as $module)
                    <li class="bg-gray-100 p-4 rounded-lg shadow-sm">
                        <h3 class="text-gray-800 font-medium">{{ $module->title }}</h3>
                        <p class="text-gray-600 text-sm">{{ $module->description }}</p>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-600">Tidak ada modul yang tersedia untuk kursus ini.</p>
        @endif
    </div>

    <div class="mt-8">
        <h2 class="text-xl font-semibold text-gray-800">Review</h2>
        @foreach ($reviews as $review)
            <div class="mt-4 p-4 bg-gray-50 rounded-lg border border-gray-200">
                <p class="text-sm text-gray-700"><strong>{{ $review->user->name }}</strong> (Rating: {{ $review->rating }})</p>
                <p class="text-gray-600">{{ $review->comment }}</p>
            </div>
        @endforeach

        @auth
            <div class="mt-6">
                <h3 class="text-lg font-semibold text-gray-800">Tambah Review</h3>
                <form action="{{ route('kursuses.review', $kursus->id) }}" method="POST" class="mt-4">
                    @csrf
                    <div class="mb-4">
                        <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                        <select id="rating" name="rating" class="block w-full mt-1 p-2 border-gray-300 rounded-lg">
                            <option value="1">1 - Buruk</option>
                            <option value="2">2 - Cukup</option>
                            <option value="3">3 - Baik</option>
                            <option value="4">4 - Sangat Baik</option>
                            <option value="5">5 - Luar Biasa</option>
                        </select>
                    </div>
                    <div>
                        <label for="comment" class="block text-sm font-medium text-gray-700">Komentar</label>
                        <textarea id="comment" name="comment" rows="4" class="block w-full mt-1 p-2 border-gray-300 rounded-lg"></textarea>
                    </div>
                    <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        Kirim Review
                    </button>
                </form>
            </div>
        @endauth
        <form class='mt-5' action="{{ route('kursuses.destroy', $kursus->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kursus ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 my-5">
                Hapus
            </button>
        </form>
    </div>
</div>
@endsection
