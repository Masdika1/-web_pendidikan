@extends('layouts.main_student')

@section('title', 'Edit Profil')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-8 bg-white shadow-lg rounded-lg">
    <h1 class="text-4xl font-semibold text-gray-800 mb-8 text-center">Edit Profil Saya</h1>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Nama -->
        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <!-- Email -->
        <div class="mb-6">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <!-- Password -->
        <div class="mb-6">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="password" name="password"
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Konfirmasi Password -->
        <div class="mb-6">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Gambar Profil -->
        <div class="mb-6">
            <label for="profile_picture" class="block text-sm font-medium text-gray-700">Gambar Profil</label>
            <input type="file" id="profile_picture" name="profile_picture"
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
        </div>

        <!-- Tombol Submit -->
        <div class="text-center">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg text-lg font-semibold hover:bg-blue-600 transition duration-300 transform hover:scale-105">
                Perbarui Profil
            </button>
        </div>
    </form>
</div>
@endsection
