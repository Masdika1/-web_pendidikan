@extends('layouts.main_instructor')

@section('title', 'Modul Tersedia')

@section('content')
<div class="container mx-auto mt-8">
    <!-- Tombol untuk menambah modul -->
    <div class="flex justify-end mb-4">
        <a href="{{ route('instructor.moduls.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
            Tambah Modul
        </a>
    </div>

    <!-- Menampilkan notifikasi -->
    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @elseif (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Jika tidak ada modul -->
    @if ($moduls->isEmpty())
        <p class="text-gray-600 text-center">Tidak ada modul yang tersedia.</p>
    @else
        <ul class="mt-4 space-y-3">
            @foreach ($moduls as $modul)
                <li class="bg-gray-100 p-4 rounded-lg shadow-sm flex justify-between items-center gap-5">
                    <div>
                        <h3 class="text-gray-800 font-medium">{{ $modul->title }}</h3>
                        <p class="text-gray-600 text-sm">{{ $modul->description }}</p>
                        <span class="inline-block bg-green-100 text-green-800 text-sm font-medium mt-2 px-3 py-1 rounded-full">
                            Kursus: {{ $modul->kursus->title ?? 'Kursus tidak ditemukan' }}
                        </span>
                    </div>
                    <div class="flex space-x-4">
                        <!-- Edit Button -->
                        <a href="{{ route('instructor.moduls.edit', $modul->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                            Edit
                        </a>
                        <!-- Delete Button -->
                        <form action="{{ route('instructor.moduls.destroy', $modul->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus modul ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                Hapus
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $moduls->links() }}
        </div>
    @endif
</div>
@endsection