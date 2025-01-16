@extends('layouts.main_instructor')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-50">
    <div class="bg-white shadow-xl rounded-lg max-w-lg w-full px-8 py-10">
        <h1 class="text-2xl font-semibold text-gray-700 mb-6 text-center">Edit Pengguna</h1>
        <form action="{{ route('userstudent.update', $user->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label for="name" class="block text-sm font-medium text-gray-600">Nama</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" required
                    class="w-full mt-2 px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" required
                    class="w-full mt-2 px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">Password (Opsional)</label>
                <input type="password" id="password" name="password" placeholder="Kosongkan jika tidak diubah"
                    class="w-full mt-2 px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>
            <div class="flex justify-between items-center mt-6">
                <button type="submit"
                    class="w-full py-3 bg-blue-600 text-white font-medium rounded-lg shadow-md hover:bg-blue-500 focus:ring focus:ring-blue-300">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection