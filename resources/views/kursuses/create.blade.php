@extends('layouts.main')

@section('content')
<div class="container mx-auto p-6">
    <div class="max-w-xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800">Buat Kursus Baru</h1>
        <form action="{{ route('kursuses.store') }}" method="POST" class="mt-6">
            @csrf
            <div class="mb-4">
                <label for="instructor_id" class="block text-sm font-medium text-gray-700">ID Instructor</label>
                <input type="text" id="instructor_id" name="instructor_id" class="block w-full mt-1 p-2 border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Judul Kursus</label>
                <input type="text" id="title" name="title" class="block w-full mt-1 p-2 border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea id="description" name="description" rows="4" class="block w-full mt-1 p-2 border-gray-300 rounded-lg" required></textarea>
            </div>
            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
                <input type="text" id="category" name="category" class="block w-full mt-1 p-2 border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" id="price" name="price" class="block w-full mt-1 p-2 border-gray-300 rounded-lg" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Simpan Kursus
            </button>
        </form>
    </div>
</div>
@endsection
