@extends('layouts.main')

@section('content')
<div class="container mx-auto my-12">

    <h1 class="text-5xl font-extrabold text-center mb-8 text-gray-900">Daftar Pembayaran</h1>

    @if(session('success'))
        <div class="alert alert-success bg-green-500 text-white p-4 rounded-lg shadow-md flex items-center space-x-4 my-10" role="alert">
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="flex justify-between items-center mb-6">
        <p class="text-gray-600 text-base">Total Pembayaran: <span class="font-bold">{{ $payments->count() }}</span></p>
        <a href="{{ route('payments.create') }}" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">Tambah Pembayaran</a>
    </div>
    <div class="bg-white shadow-2xl rounded-xl overflow-hidden">
        <table class="w-full border-collapse">
            <thead class="bg-gradient-to-r from-gray-800 to-gray-900 text-white">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider border-b border-gray-700">ID</th>
                    <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider border-b border-gray-700">User</th>
                    <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider border-b border-gray-700">Kursus</th>
                    <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider border-b border-gray-700">Amount</th>
                    <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider border-b border-gray-700">Status</th>
                    <th class="px-6 py-4 text-center text-sm font-bold uppercase tracking-wider border-b border-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-gray-50">
                @forelse ($payments as $payment)
                    <tr class="hover:bg-gray-100 transition-all duration-300">
                        <td class="px-6 py-4 text-sm text-gray-800 font-semibold">{{ $payment->id }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800 font-medium">{{ $payment->user->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $payment->kursus->title }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800">Rp.{{ number_format($payment->amount, 2) }}</td>
                        <td class="px-6 py-4 text-sm">
                            <span class="px-3 py-1 rounded-full {{ $payment->payment_status === 'completed' ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600' }}">
                                {{ ucfirst($payment->payment_status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm flex justify-center space-x-4">
                            <a href="{{ route('payments.edit', $payment->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg shadow-lg hover:shadow-xl hover:bg-yellow-600 transform hover:scale-105 transition-all">Edit</a>
                            <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg shadow-lg hover:shadow-xl hover:bg-red-600 transform hover:scale-105 transition-all">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">No payments found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-8 flex justify-between items-center">
        <p class="text-sm text-gray-600">Menampilkan {{ $payments->count() }} pembayaran</p>
        <a href="#" class="text-blue-500 hover:underline text-sm font-semibold">Lihat semua pembayaran</a>
    </div>
</div>
@endsection