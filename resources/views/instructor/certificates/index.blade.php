@extends('layouts.main_instructor')

@section('content')
<div class="max-w-5xl mx-auto mt-10 p-10 bg-white rounded-lg shadow-xl">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Manajemen Sertifikat</h1>

    <!-- Notifikasi -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol Tambah Sertifikat -->
    <div class="mb-6 flex justify-end">
        <a href="{{ route('instructor.certificates.create') }}"
           class="px-5 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            Tambah Sertifikat
        </a>
    </div>

    <!-- Tabel Sertifikat -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="py-3 px-4 text-left">No</th>
                    <th class="py-3 px-4 text-left">Nama Peserta</th>
                    <th class="py-3 px-4 text-left">Judul Kursus</th>
                    <th class="py-3 px-4 text-left">Kode Sertifikat</th>
                    <th class="py-3 px-4 text-left">Tanggal Terbit</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($certificates as $certificate)
                <tr class="border-t border-gray-200 hover:bg-gray-50">
                    <td class="py-3 px-4">{{ $loop->iteration }}</td>
                    <td class="py-3 px-4">{{ $certificate->enrollment->user->name }}</td>
                    <td class="py-3 px-4">{{ $certificate->enrollment->kursus->title }}</td>
                    <td class="py-3 px-4">{{ $certificate->certificate_code }}</td>
                    <td class="py-3 px-4">{{ $certificate->issue_date->format('d M Y') }}</td>
                    <td class="py-3 px-4 text-center space-x-2">
                        <a href="{{ route('instructor.certificates.show', $certificate->id) }}"
                           class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Detail
                        </a>
                        <form action="{{ route('instructor.certificates.delete', $certificate->id) }}"
                              method="POST" class="inline-block"
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus sertifikat ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-6 text-center text-gray-500">Tidak ada sertifikat yang tersedia.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- <!-- Pagination -->
    <div class="mt-8">
        {{ $certificates->links() }}
    </div> --}}
</div>
@endsection
