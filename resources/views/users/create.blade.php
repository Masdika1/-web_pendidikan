@extends('layouts.main')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-50">
    <div class="bg-white shadow-xl rounded-lg max-w-lg w-full px-8 py-10">
        <h1 class="text-2xl font-semibold text-gray-700 mb-6 text-center">Tambah Pengguna</h1>
        <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-600">Nama</label>
                <input type="text" id="name" name="name" placeholder="Masukkan nama" required
                    class="w-full mt-2 px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email" required
                    class="w-full mt-2 px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required
                    class="w-full mt-2 px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-600">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password"
                    required class="w-full mt-2 px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>
            <div>
                <label for="role" class="block text-sm font-medium text-gray-600">Role</label>
                <select id="role" name="role" required
                    class="w-full mt-2 px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
                    <option value="student">Student</option>
                    <option value="instructor">Instructor</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="flex justify-between items-center mt-6">
                <button type="submit"
                    class="w-full py-3 bg-blue-600 text-white font-medium rounded-lg shadow-md hover:bg-blue-500 focus:ring focus:ring-blue-300">
                    Tambah Pengguna
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
