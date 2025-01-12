@extends('layouts.main_student')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-left">
        Module Details
    </h1>

    <!-- Card Modul -->
    <div class="bg-white shadow-2xl rounded-2xl border border-gray-200 max-w-4xl mx-auto overflow-hidden">
        <!-- Header Card -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-400 text-white p-6">
            <h2 class="text-3xl font-bold truncate">
                {{ $modul->title }}
            </h2>
        </div>

        <!-- Konten Card -->
        <div class="p-8">
            <p class="text-gray-700 mb-6 leading-relaxed">
                {{ $modul->description }}
            </p>
            <div class="mb-6">
                <strong class="block text-gray-800 text-sm">Order:</strong>
                <span class="text-gray-900 text-lg font-medium">{{ $modul->order_no }}</span>
            </div>
            <a href="{{ route('student.moduls.index') }}"
               class="inline-flex items-center bg-blue-600 text-white text-sm font-semibold px-5 py-3 rounded-lg shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-300 focus:ring-offset-2 transition">
                <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                Back to List
            </a>
        </div>
    </div>
</div>
@endsection
