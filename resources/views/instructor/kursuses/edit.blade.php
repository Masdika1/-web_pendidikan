@extends('layouts.main_instructor')

@section('content')
<div class="max-w-2xl mt-8 mx-auto py-10 px-8 bg-gradient-to-r from-white to-gray-100 rounded-xl shadow-xl">
    <h2 class="text-4xl font-bold text-gray-800 mb-8 text-center">Edit Kursus</h2>
        <div class="p-8">
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('instructor.kursuses.update', $kursus->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Judul Kursus -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Judul Kursus</label>
                    <input type="text" id="title" name="title"
                           class="mt-1 w-full border-gray-300 rounded-lg shadow focus:ring-blue-500 focus:border-blue-500 p-3"
                           value="{{ old('title', $kursus->title) }}" placeholder="Masukkan judul kursus" required>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea id="description" name="description" rows="5"
                              class="mt-1 w-full border-gray-300 rounded-lg shadow focus:ring-blue-500 focus:border-blue-500 p-3"
                              placeholder="Deskripsikan kursus ini" required>{{ old('description', $kursus->description) }}</textarea>
                </div>

                <!-- Kategori -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <input type="text" id="category" name="category"
                           class="mt-1 w-full border-gray-300 rounded-lg shadow focus:ring-blue-500 focus:border-blue-500 p-3"
                           value="{{ old('category', $kursus->category) }}" placeholder="Masukkan kategori kursus" required>
                </div>

                <!-- Harga -->
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
                    <input type="number" id="price" name="price"
                           class="mt-1 w-full border-gray-300 rounded-lg shadow focus:ring-blue-500 focus:border-blue-500 p-3"
                           value="{{ old('price', $kursus->price) }}" placeholder="Masukkan harga kursus" required>
                </div>

                <!-- Gambar -->
                <div>
                    <label for="picture" class="block text-sm font-medium text-gray-700">Gambar Kursus (Opsional)</label>
                    @if ($kursus->picture)
                        <div class="mt-4">
                            <img src="{{ asset('storage/' . $kursus->picture) }}" alt="Gambar Kursus"
                                 class="h-40 w-40 rounded-lg border border-gray-300 object-cover shadow-lg">
                        </div>
                    @endif
                    <input type="file" id="picture" name="picture"
                           class="mt-3 w-full border-gray-300 rounded-lg shadow focus:ring-blue-500 focus:border-blue-500 p-3">
                </div>

                <!-- Tombol -->
                <div class="flex justify-end space-x-4 mt-8">
                    <a href="{{ route('instructor.kursuses.index') }}"
                       class="px-5 py-2 bg-gray-100 text-gray-700 border border-gray-300 rounded-lg shadow hover:bg-gray-200">
                        Batal
                    </a>
                    <button type="submit"
                            class="px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
