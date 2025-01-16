@extends('layouts.main_instructor')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Edit Modul</h1>
    <form action="{{ route('instructor.moduls.update', $modul->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div class="hidden">
            <label for="title" class="block text-gray-700 font-medium mb-2">Judul</label>
            <input type="text" id="kursus_id" name="kursus_id" value="{{ $modul->kursus_id }}" class="w-full border-gray-300 rounded shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
        </div>
        <div>
            <label for="title" class="block text-gray-700 font-medium mb-2">Judul</label>
            <input type="text" id="title" name="title" value="{{ $modul->title }}" class="w-full border-gray-300 rounded shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
        </div>
        <div>
            <label for="description" class="block text-gray-700 font-medium mb-2">Deskripsi</label>
            <textarea id="description" name="description" class="w-full border-gray-300 rounded shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" rows="4" required>{{ $modul->description }}</textarea>
        </div>
        <div>
            <label for="order_no" class="block text-gray-700 font-medium mb-2">Nomor Urut</label>
            <input type="number" id="order_no" name="order_no" value="{{ $modul->order_no }}" class="w-full border-gray-300 rounded shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Simpan Perubahan
        </button>
    </form>
</div>
@endsection
