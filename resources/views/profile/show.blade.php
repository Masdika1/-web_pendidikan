@extends('layouts.main_student')

@section('title', 'Profil Saya')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-4xl font-semibold text-gray-800 mb-8 text-center">Profil Saya</h1>

    <!-- Gambar Profil dan Informasi Pengguna -->
    <div class="flex justify-center mb-6">
        <div class="relative">
            <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('images/default-profile.jpg') }}"
                 alt="Profile Picture" class="w-40 h-40 rounded-full border-4 border-gray-300 shadow-md object-cover transform hover:scale-105 transition duration-300">
        </div>
    </div>

    <!-- Informasi Nama -->
    <div class="flex items-center justify-between mb-4 bg-gray-50 p-4 rounded-lg shadow-sm hover:shadow-md transition duration-300">
        <strong class="text-lg font-medium text-gray-800">Nama:</strong>
        <p class="text-gray-600 text-lg">{{ $user->name }}</p>
    </div>

    <!-- Informasi Email -->
    <div class="flex items-center justify-between mb-4 bg-gray-50 p-4 rounded-lg shadow-sm hover:shadow-md transition duration-300">
        <strong class="text-lg font-medium text-gray-800">Email:</strong>
        <p class="text-gray-600 text-lg">{{ $user->email }}</p>
    </div>

    <!-- Tombol Edit Profil -->
    <div class="mt-8 text-center">
        <a href="{{ route('profile.edit') }}"
           class="bg-gray-800 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-gray-700 transition duration-300 transform hover:scale-105">
           Edit Profil
        </a>
    </div>
</div>
@endsection
