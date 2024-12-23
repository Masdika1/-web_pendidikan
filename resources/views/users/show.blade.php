@extends('layouts.main')

@section('content')
<div class="container mx-auto mt-12">
    <div class="bg-white shadow-lg rounded-lg px-8 py-10 border border-gray-200 max-w-xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Detail Pengguna</h1>
        <div class="space-y-4">
            <div>
                <p class="text-sm font-medium text-gray-700">Nama:</p>
                <p class="text-lg text-gray-900">{{ $user->name }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">Email:</p>
                <p class="text-lg text-gray-900">{{ $user->email }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">Role:</p>
                <p class="text-lg text-gray-900">{{ $user->role }}</p>
            </div>
        </div>
        <div class="mt-8 flex justify-center">
            <a href="{{ route('users.index') }}"
                class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg shadow-md hover:bg-blue-500 transition duration-300">
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection
