@extends('layouts.main')

@section('content')
<div class="container mx-auto my-12">
    <h1 class="text-5xl font-extrabold text-center mb-8 text-gray-900">Daftar Pengguna</h1>
    <div class="flex justify-between items-center mb-6">
        <p class="text-gray-600 text-base">Total Pengguna: <span class="font-bold">{{ $users->count() }}</span></p>
        <a href="{{ route('users.create') }}" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">Tambah Pengguna</a>
    </div>
    <div class="bg-white shadow-2xl rounded-xl overflow-hidden">
        <table class="w-full border-collapse">
            <thead class="bg-gradient-to-r from-gray-800 to-gray-900 text-white">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider border-b border-gray-700">No</th>
                    <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider border-b border-gray-700">Nama</th>
                    <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider border-b border-gray-700">Email</th>
                    <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider border-b border-gray-700">Role</th>
                    <th class="px-6 py-4 text-center text-sm font-bold uppercase tracking-wider border-b border-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-gray-50">
                @foreach($users as $key => $user)
                <tr class="hover:bg-gray-100 transition-all duration-300">
                    <td class="px-6 py-4 text-sm text-gray-800 font-semibold">{{ $key + 1 }}</td>
                    <td class="px-6 py-4 text-sm text-gray-800 font-medium">{{ $user->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-800">{{ $user->email }}</td>
                    <td class="px-6 py-4 text-sm text-gray-800 capitalize">{{ $user->role }}</td>
                    <td class="px-6 py-4 text-sm flex justify-center space-x-4">
                        <a href="{{ route('users.show', $user->id) }}" class="px-4 py-2 bg-green-500 text-white rounded-lg shadow-lg hover:shadow-xl hover:bg-green-600 transform hover:scale-105 transition-all">Detail</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg shadow-lg hover:shadow-xl hover:bg-yellow-600 transform hover:scale-105 transition-all">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg shadow-lg hover:shadow-xl hover:bg-red-600 transform hover:scale-105 transition-all" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-8 flex justify-between items-center">
        <p class="text-sm text-gray-600">Menampilkan {{ $users->count() }} pengguna</p>
        <a href="#" class="text-blue-500 hover:underline text-sm font-semibold">Lihat semua pengguna</a>
    </div>
</div>
@endsection
