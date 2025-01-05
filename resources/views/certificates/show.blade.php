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

    <a href="{{ route('certificates.index') }}" class="mt-4 inline-block text-blue-500 hover:underline">
        Back to List
    </a>
</div>
@endsection
