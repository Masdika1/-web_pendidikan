@extends('layouts.main_instructor')

@section('content')
<div class="max-w-3xl mx-auto mt-10 p-10 bg-gradient-to-r from-white to-gray-100 rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Detail Sertifikat</h1>

    <!-- Informasi Sertifikat -->
    <div class="space-y-6 text-lg">
        <p><strong class="font-semibold text-gray-700">Nama Peserta:</strong> {{ $certificate->enrollment->user->name }}</p>
        <p><strong class="font-semibold text-gray-700">Judul Kursus:</strong> {{ $certificate->enrollment->kursus->title }}</p>
        <p><strong class="font-semibold text-gray-700">Kode Sertifikat:</strong> {{ $certificate->certificate_code }}</p>
        <p><strong class="font-semibold text-gray-700">Tanggal Terbit:</strong> {{ $certificate->issue_date->format('d M Y') }}</p>
    </div>

    <!-- Opsi Cetak Sertifikat -->
    <div class="mt-8 flex justify-end space-x-4">
        <a href="{{ route('instructor.certificates.index') }}"
           class="px-5 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">
            Kembali
        </a>
    </div>
</div>
@endsection
