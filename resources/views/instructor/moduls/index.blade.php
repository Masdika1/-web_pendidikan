<!-- resources/views/instructor/moduls/index.blade.php -->

@extends('layouts.main_instructor')

@section('title', 'Modul Tersedia')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Daftar Modul</h1>

    <!-- Tombol Tambah Modul -->
    <a href="{{ route('instructor.moduls.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-blue-600">
        Tambah Modul Baru
    </a>

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
        <p class="text-gray-600">Tidak ada modul yang tersedia.</p>
    @else
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-300 shadow-md">
                <thead>
                    <tr class="bg-gray-50 text-gray-700">
                        <th class="border border-gray-300 px-4 py-2 text-left">#</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Judul</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Deskripsi</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Kursus</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($moduls as $modul)
                        <tr class="hover:bg-gray-100 even:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $modul->title }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $modul->description }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $modul->kursus->title ?? 'Kursus tidak ditemukan' }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center space-x-2">
                                <a href="{{ route('instructor.moduls.edit', $modul->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                    Edit
                                </a>
                                <form action="{{ route('instructor.moduls.destroy', $modul->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600" onclick="return confirm('Yakin ingin menghapus modul ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $moduls->links() }}
        </div>
    @endif
</div>
@endsection
