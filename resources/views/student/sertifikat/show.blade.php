@extends('layouts.main_student')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold text-gray-800">Detail Sertifikat</h1>

    <div class="bg-gray-100 p-6 rounded-lg shadow-md mt-4">
        <h2 class="text-gray-800 font-medium">Nama Peserta: {{ $certificate->enrollment->user->name }}</h2>
        <p class="text-gray-600">Kursus: {{ $certificate->enrollment->kursus->title }}</p>
        <p class="text-gray-600">Kode Sertifikat: <strong>{{ $certificate->certificate_code }}</strong></p>
        <p class="text-gray-600">Tanggal Diterbitkan: {{ $certificate->issue_date->format('d M Y') }}</p>
    </div>
</div>
@endsection
