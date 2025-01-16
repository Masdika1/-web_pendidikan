@extends('layouts.main_instructor')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-6">Tambah Modul</h1>

    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('instructor.moduls.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="kursus_id" class="block font-bold">Kursus</label>
            <select id="kursus_id" name="kursus_id" class="w-full border-gray-300 rounded shadow-sm" required>
                @foreach ($kursuses as $kursus)
                    <option value="{{ $kursus->id }}">{{ $kursus->title }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="title" class="block font-bold">Judul Modul</label>
            <input type="text" id="title" name="title" class="w-full border-gray-300 rounded shadow-sm" value="{{ old('title') }}" required>
        </div>

        <div>
            <label for="description" class="block font-bold">Deskripsi</label>
            <textarea id="description" name="description" class="w-full border-gray-300 rounded shadow-sm" rows="4">{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="order_no" class="block font-bold">Urutan Modul</label>
            <input type="number" id="order_no" name="order_no" class="w-full border-gray-300 rounded shadow-sm" value="{{ old('order_no') }}" required>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        </div>
    </form>
</div>
@endsection
