@extends('layouts.main')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-6">Edit Modul: {{ $modul->title }}</h1>

    <form action="{{ route('moduls.update', $modul->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block font-bold">Judul Modul</label>
            <input type="text" id="title" name="title" class="w-full border-gray-300 rounded shadow-sm" value="{{ old('title', $modul->title) }}" required>
        </div>

        <div>
            <label for="description" class="block font-bold">Deskripsi</label>
            <textarea id="description" name="description" class="w-full border-gray-300 rounded shadow-sm" rows="4">{{ old('description', $modul->description) }}</textarea>
        </div>

        <div>
            <label for="order_no" class="block font-bold">Urutan Modul</label>
            <input type="number" id="order_no" name="order_no" class="w-full border-gray-300 rounded shadow-sm" value="{{ old('order_no', $modul->order_no) }}" required>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Perbarui Modul</button>
        </div>
    </form>
</div>
@endsection
