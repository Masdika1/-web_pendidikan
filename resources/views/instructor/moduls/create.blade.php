@extends('layouts.main_instructor')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Tambah Modul</h1>

    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('instructor.moduls.store') }}" method="POST" class="space-y-6 bg-white p-8 rounded-lg shadow-lg">
        @csrf

        <div>
            <label for="kursus_id" class="block text-lg font-semibold text-gray-700">Kursus</label>
            <select id="kursus_id" name="kursus_id" class="w-full mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @foreach ($kursuses as $kursus)
                    <option value="{{ $kursus->id }}">{{ $kursus->title }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="title" class="block text-lg font-semibold text-gray-700">Judul Modul</label>
            <input type="text" id="title" name="title" class="w-full mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('title') }}" required>
        </div>

        <div>
            <label for="description" class="block text-lg font-semibold text-gray-700">Deskripsi</label>
            <textarea id="description" name="description" class="w-full mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" required>{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="order_no" class="block text-lg font-semibold text-gray-700">Urutan Modul</label>
            <input type="number" id="order_no" name="order_no" class="w-full mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('order_no') }}" required>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-3 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">Simpan</button>
        </div>
    </form>
</div>
@endsection