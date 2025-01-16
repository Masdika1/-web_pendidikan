@extends('layouts.main')

@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-xl font-semibold mb-6">Tambah Modul Baru</h2>

    <!-- Form untuk memilih kursus dan menambah modul -->
    <form action="{{ route('moduls.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="kursus_id" class="block text-gray-700">Pilih Kursus</label>
            <select name="kursus_id" id="kursus_id" class="w-full px-4 py-2 border rounded-lg" required>
                @foreach ($kursus as $kursusItem)
                    <option value="{{ $kursusItem->id }}">{{ $kursusItem->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="title" class="block text-gray-700">Judul Modul</label>
            <input type="text" name="title" id="title" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700">Deskripsi Modul</label>
            <textarea name="description" id="description" rows="4" class="w-full px-4 py-2 border rounded-lg" required></textarea>
        </div>

        <div class="mb-4">
            <label for="order_no" class="block text-gray-700">Urutan</label>
            <input type="number" name="order_no" id="order_no" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Simpan Modul</button>
    </form>
</div>
@endsection
