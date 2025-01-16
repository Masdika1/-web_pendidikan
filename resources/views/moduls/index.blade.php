@extends('layouts.main')

@section('content')
<div class="container mx-auto mt-8">
    <!-- Tombol untuk menambah modul, dengan mengirimkan ID kursus -->
    <a href="{{ route('moduls.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
        Tambah Modul
    </a>

    <ul class="mt-4 space-y-3">
        @foreach ($moduls as $modul)
            <li class="bg-gray-100 p-4 rounded-lg shadow-sm flex justify-between items-center gap-5">
                <div>
                    <h3 class="text-gray-800 font-medium">{{ $modul->title }}</h3>
                    <p class="text-gray-600 text-sm">{{ $modul->description }}</p>
                </div>
                <div class="flex space-x-4"> <!-- space-x-4 memberikan jarak antar tombol -->
                    <!-- Edit Button -->
                    <a href="{{ route('moduls.edit', $modul->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                        Edit
                    </a>
                    <!-- Delete Button -->
                    <form action="{{ route('moduls.destroy', $modul->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus modul ini?')">
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
</div>
@endsection
