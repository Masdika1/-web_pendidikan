@extends('layouts.main')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Certificate Details</h1>

    <div class="bg-white shadow-md rounded p-6">
        <p><strong>ID:</strong> {{ $certificate->id }}</p>
        <p><strong>Enrollment:</strong> {{ $certificate->enrollment->user->name }} - {{ $certificate->enrollment->kursus->title }}</p>
        <p><strong>Certificate Code:</strong> {{ $certificate->certificate_code }}</p>
        <p><strong>Issue Date:</strong> {{ $certificate->issue_date }}</p>
    </div>

    <div class="mt-6 flex justify-between">
        <a href="{{ route('certificates.index') }}" class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg shadow-md hover:bg-blue-500 transition duration-300">
            Back to List
        </a>
    </div>
</div>
@endsection
