@extends('layouts.main_instructor')

@section('content')
<div class="max-w-2xl mx-auto mt-8 p-8 bg-white shadow-lg rounded-lg">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Tambah Sertifikat</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('instructor.certificates.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="enrollment_id" class="block text-sm font-medium text-gray-700">Siswa yang Lulus</label>
            <select name="enrollment_id" id="enrollment_id" class="w-full border-gray-300 p-2 rounded-lg">
                @foreach ($enrollments as $enrollment)
                    <option value="{{ $enrollment->id }}">{{ $enrollment->user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="certificate_code" class="block text-sm font-medium text-gray-700">Kode Sertifikat</label>
            <input type="text" name="certificate_code" id="certificate_code"
                   class="w-full border-gray-300 p-2 rounded-lg" placeholder="Masukkan kode sertifikat unik" required>
        </div>

        <div class="mt-6 flex justify-end">
            <a href="{{ route('instructor.certificates.index') }}" class="mr-4 bg-gray-200 px-4 py-2 rounded-lg">Batal</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Simpan</button>
        </div>
    </form>
</div>
@endsection
