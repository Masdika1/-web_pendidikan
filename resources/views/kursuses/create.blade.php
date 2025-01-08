@extends('layouts.main')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Buat Kursus Baru</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-600 p-4 rounded mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kursuses.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label for="instructor_id" class="block text-gray-700 text-sm font-bold mb-2">ID Pengajar</label>
            <input
                type="number"
                name="instructor_id"
                id="instructor_id"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="Masukkan ID Pengajar"
                value="{{ old('instructor_id') }}"
                required
            >
        </div>

        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Judul Kursus</label>
            <input
                type="text"
                name="title"
                id="title"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="Masukkan Judul Kursus"
                value="{{ old('title') }}"
                required
            >
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
            <textarea
                name="description"
                id="description"
                rows="4"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="Masukkan Deskripsi Kursus"
                required
            >{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
            <input
                type="text"
                name="category"
                id="category"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="Masukkan Kategori Kursus"
                value="{{ old('category') }}"
                required
            >
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Harga</label>
            <input
                type="number"
                name="price"
                id="price"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="Masukkan Harga Kursus"
                value="{{ old('price') }}"
                required
            >
        </div>

        <div class="mb-4">
            <label for="picture" class="block text-gray-700 text-sm font-bold mb-2">Gambar Kursus</label>
            <input
                type="file"
                name="picture"
                id="picture"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                accept="image/*"
            >
            <small class="text-gray-600">Format gambar yang diperbolehkan: jpeg, png, jpg, gif. Maksimal 2MB.</small>
        </div>

        <div class="flex items-center justify-between">
            <button
                type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            >
                Simpan
            </button>
            <a
                href="{{ route('kursuses.index') }}"
                class="text-blue-500 hover:underline text-sm"
            >
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
