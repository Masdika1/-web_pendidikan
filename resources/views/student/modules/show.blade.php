@extends('layouts.main_student')

@section('title', 'Lesson Details')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
    <h2 class="text-3xl font-bold text-gray-800 mb-4">Detail Pelajaran</h2>

    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow">
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-4">
        <div>
            <h3 class="text-xl font-semibold text-gray-800">Judul:</h3>
            <p class="text-gray-600">{{ $lesson->title }}</p>
        </div>

        <div>
            <h3 class="text-xl font-semibold text-gray-800">Konten:</h3>
            <p class="text-gray-600">{{ $lesson->content }}</p>
        </div>

        <div>
            <h3 class="text-xl font-semibold text-gray-800">Modul:</h3>
            <p class="text-gray-600">{{ $lesson->module->title ?? 'N/A' }}</p>
        </div>

        <div>
            <h3 class="text-xl font-semibold text-gray-800">Urutan:</h3>
            <p class="text-gray-600">{{ $lesson->order_no }}</p>
        </div>

        <div>
            <h3 class="text-xl font-semibold text-gray-800">Video:</h3>
            @if ($lesson->video_url)
                <a href="{{ $lesson->video_url }}" target="_blank" class="text-blue-500 hover:underline">Tonton Video</a>
            @else
                <p class="text-gray-600">Tidak ada video.</p>
            @endif
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('student.kursusku.index') }}" class="px-6 py-3 bg-blue-500 text-white rounded-full shadow-lg hover:shadow-xl hover:bg-blue-600 transform hover:scale-105 transition-all">Kembali ke Daftar Pelajaran</a>
    </div>
</div>
@endsection
