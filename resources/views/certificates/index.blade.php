@extends('layouts.main')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Certificates</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('certificates.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Create Certificate
        </a>
    </div>

    <table class="w-full table-auto border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">Enrollment</th>
                <th class="border border-gray-300 px-4 py-2">Certificate Code</th>
                <th class="border border-gray-300 px-4 py-2">Issue Date</th>
                <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($certificates as $certificate)
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2">{{ $certificate->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        {{ $certificate->enrollment->user->name }} - {{ $certificate->enrollment->kursus->title }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $certificate->certificate_code }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $certificate->issue_date }}</td>
                    <td class="border border-gray-300 px-4 py-2 flex space-x-2">
                        <a href="{{ route('certificates.show', $certificate->id) }}"
                           class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-sm">
                            View
                        </a>
                        <a href="{{ route('certificates.edit', $certificate->id) }}"
                           class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-sm">
                            Edit
                        </a>
                        <form action="{{ route('certificates.destroy', $certificate->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm"
                                    onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="border border-gray-300 px-4 py-2 text-center text-gray-500">
                        No certificates found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
