@extends('layouts.main_student')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-4xl font-extrabold text-gray-800 text-center">Daftar Sertifikat</h1>
    <p class="text-center text-gray-500 text-lg mb-8">Lihat sertifikat yang telah Anda peroleh setelah menyelesaikan kursus.</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($certificates as $certificate)
            <div class="bg-white border border-gray-300 rounded-lg overflow-hidden shadow-lg transform hover:scale-105 transition-all duration-300 ease-in-out">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-2">{{ $certificate->enrollment->user->name }}</h2>
                    <p class="text-gray-600 mb-4">Kursus: <span class="font-medium">{{ $certificate->enrollment->kursus->title }}</span></p>
                    <p class="text-gray-500">Kode Sertifikat: <strong class="text-blue-600">{{ $certificate->certificate_code }}</strong></p>
                </div>
                <div class="bg-blue-500 p-4 text-center text-white font-semibold">
                    <a href="{{ route('student.sertifikat.show', $certificate->id) }}" class="hover:underline">
                        Lihat Detail Sertifikat
                    </a>
                </div>
            </div>
        @empty
            <p class="text-gray-600 col-span-full text-center">Anda belum memiliki sertifikat.</p>
        @endforelse
    </div>
</div>
@endsection
