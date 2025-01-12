@extends('layouts.main')

@section('title', 'Detail Enrollment')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-3xl mx-auto">
        <!-- Heading -->
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-left">
            Detail Enrollment
        </h1>

        <!-- Card Detail -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
            <!-- Header Card -->
            <div class="bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 text-white p-6">
                <h2 class="text-2xl font-bold">
                    {{ $enrollment->kursus->title }}
                </h2>
                <p class="text-sm mt-1">
                    <strong>Progress:</strong> {{ $enrollment->progress ?? 0 }}%
                </p>
            </div>

            <!-- Konten Card -->
            <div class="p-6">
                <div class="mb-4">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Informasi Siswa</h3>
                    <p class="text-sm text-gray-600 mb-1">
                        <strong>Nama:</strong> {{ $enrollment->user->name }}
                    </p>
                    <p class="text-sm text-gray-600 mb-1">
                        <strong>Email:</strong> {{ $enrollment->user->email }}
                    </p>
                    <p class="text-sm text-gray-600">
                        <strong>Tanggal Enroll:</strong>
                        {{ $enrollment->created_at ? $enrollment->created_at->format('d M Y') : 'Tidak tersedia' }}
                    </p>
                </div>

                <!-- Progress Bar -->
                <div class="my-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Progress</h3>
                    <div class="w-full bg-gray-200 rounded-full h-4">
                        <div class="bg-blue-500 h-4 rounded-full transition-all duration-300"
                             style="width: {{ $enrollment->progress ?? 0 }}%;"></div>
                    </div>
                    <p class="text-sm text-gray-500 mt-2">
                        {{ $enrollment->progress ?? 0 }}% completed
                    </p>
                </div>
                <!-- Button -->
                <div class="mt-8 text-right">
                    <a href="{{ route('enrollments.index') }}"
                        class="bg-gray-600 text-white px-6 py-3 rounded-lg shadow hover:bg-gray-700 transition">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
