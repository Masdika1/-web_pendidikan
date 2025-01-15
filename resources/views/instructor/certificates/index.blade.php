@extends('layouts.main_instructor')

@section('content')
<div class="container mx-auto my-12">

    <h1 class="text-5xl font-extrabold text-center mb-8 text-gray-900">Daftar Sertifikat</h1>

    @if(session('success'))
        <div class="alert alert-success bg-green-500 text-white p-4 rounded-lg shadow-md flex items-center space-x-4 my-10" role="alert">
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="flex justify-between items-center mb-6">
        <p class="text-gray-600 text-base">Total Sertifikat: <span class="font-bold">{{ $certificates->count() }}</span></p>
        <a href="{{ route('instructor.certificates.create') }}" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">Tambah Sertifikat</a>
    </div>
    <div class="bg-white shadow-2xl rounded-xl overflow-hidden">
        <table class="w-full border-collapse">
            <thead class="bg-gradient-to-r from-gray-800 to-gray-900 text-white">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider border-b border-gray-700">ID</th>
                    <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider border-b border-gray-700">Enrollment</th>
                    <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider border-b border-gray-700">Certificate Code</th>
                    <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider border-b border-gray-700">Issue Date</th>
                    <th class="px-6 py-4 text-center text-sm font-bold uppercase tracking-wider border-b border-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-gray-50">
                @forelse ($certificates as $certificate)
                    <tr class="hover:bg-gray-100 transition-all duration-300">
                        <td class="px-6 py-4 text-sm text-gray-800 font-semibold">{{ $certificate->id }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800 font-medium">
                            {{ $certificate->enrollment->user->name }} - {{ $certificate->enrollment->kursus->title }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $certificate->certificate_code }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $certificate->issue_date }}</td>
                        <td class="px-6 py-4 text-sm flex justify-center space-x-4">
                            <a href="{{ route('instructor.certificates.show', $certificate->id) }}" class="px-4 py-2 bg-green-500 text-white rounded-lg shadow-lg hover:shadow-xl hover:bg-green-600 transform hover:scale-105 transition-all">Detail</a>
                            <form action="{{ route('instructor.certificates.delete', $certificate->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus sertifikat ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg shadow-lg hover:shadow-xl hover:bg-red-600 transform hover:scale-105 transition-all">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada sertifikat yang tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-8 flex justify-between items-center">
        <p class="text-sm text-gray-600">Menampilkan {{ $certificates->count() }} sertifikat</p>
        <a href="#" class="text-blue-500 hover:underline text-sm font-semibold">Lihat semua sertifikat</a>
    </div>
</div>
@endsection