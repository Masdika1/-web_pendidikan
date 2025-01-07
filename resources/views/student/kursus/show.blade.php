@extends('layouts.main_student')

@section('title', 'Detail Kursus')

@section('content')
<div class="max-w-5xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-10">
    <!-- Course Title -->
    <h1 class="text-4xl font-extrabold text-gray-800 mb-4 text-center">{{ $kursus->title }}</h1>

    <!-- Course Description -->
    <p class="text-gray-600 text-lg leading-relaxed text-center mb-6">
        {{ $kursus->description }}
    </p>

    <!-- Course Price -->
    <div class="flex justify-center items-center mb-8">
        <span class="text-2xl font-bold text-green-600">Harga: Rp.{{ number_format($kursus->price, 2) }}</span>
    </div>

    <!-- Purchase Form -->
    <form action="{{ route('student.payments.store') }}" method="POST" class="mt-6">
        @csrf
        <input type="hidden" name="kursus_id" value="{{ $kursus->id }}">
        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
        <input type="hidden" name="amount" value="{{ $kursus->price }}">
        <input type="hidden" name="payment_status" value="pending">

        <!-- Call to Action Button -->
        <div class="flex justify-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold px-8 py-3 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                Beli Sekarang
            </button>
        </div>
    </form>

    <!-- Additional Information -->
    <div class="mt-10 p-6 bg-gray-100 rounded-lg shadow-inner">
        <h2 class="text-2xl font-bold text-gray-700 mb-4">Detail Instruktur</h2>
        <p class="text-gray-600"><span class="font-semibold">Nama:</span> {{ $kursus->instructor->name }}</p>
        <p class="text-gray-600"><span class="font-semibold">Email:</span> {{ $kursus->instructor->email }}</p>
    </div>
</div>
@endsection
