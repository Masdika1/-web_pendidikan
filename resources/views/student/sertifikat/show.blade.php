@extends('layouts.main_student')

@section('content')
<div class="container mx-auto mt-12">
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
        <div class="bg-gray-800 text-white text-center py-6">
            <h1 class="text-2xl font-bold uppercase tracking-wide">Detail Sertifikat</h1>
        </div>
        <div class="p-8">
            <div class="text-center mb-6">
                <h2 class="text-left font-medium text-gray-800 mb-1">Nama Peserta</h2>
                <p class="text-left text-gray-700 text-xl font-bold">{{ $certificate->enrollment->user->name }}</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="border border-gray-300 rounded-lg p-4">
                    <h3 class="text-gray-600 font-medium text-sm mb-1">Kursus</h3>
                    <p class="text-gray-800 font-semibold">{{ $certificate->enrollment->kursus->title }}</p>
                </div>
                <div class="border border-gray-300 rounded-lg p-4">
                    <h3 class="text-gray-600 font-medium text-sm mb-1">Kode Sertifikat</h3>
                    <p class="text-gray-800 font-bold">{{ $certificate->certificate_code }}</p>
                </div>
                <div class="border border-gray-300 rounded-lg p-4">
                    <h3 class="text-gray-600 font-medium text-sm mb-1">Tanggal Diterbitkan</h3>
                    <p class="text-gray-800 font-semibold">{{ $certificate->issue_date->format('d M Y') }}</p>
                </div>
            </div>
            <div class="mt-8 flex justify-end ">
                <a href="{{ route('student.sertifikat.index') }}"
                   class="inline-block bg-gray-800 hover:bg-gray-700 text-white font-semibold text-sm px-6 py-3 rounded-md shadow-md transition-transform transform hover:scale-105">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
