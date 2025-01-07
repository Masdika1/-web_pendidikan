@extends('layouts.main_student')

@section('title', 'My Payments')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <!-- Header -->
    <div class="text-left mb-10">
        <h1 class="text-3xl font-bold text-black-700 tracking-wide">Riwayat Pembayaran</h1>
        <p class="text-gray-600 mt-4">Kelola semua riwayat pembayaran kursus anda dengan mudah</p>
    </div>

    <!-- Success or Error Alerts -->
    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded mb-6 shadow-md" role="alert">
            <p class="font-bold">Success</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded mb-6 shadow-md" role="alert">
            <p class="font-bold">Error</p>
            <p>{{ session('error') }}</p>
        </div>
    @endif

    <!-- Payments Table -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <table class="w-full">
            <thead class="bg-gradient-to-r from-gray-500 to-gray-600 text-white">
                <tr>
                    <th class="text-left px-6 py-4 text-sm font-semibold uppercase tracking-wide">ID</th>
                    <th class="text-left px-6 py-4 text-sm font-semibold uppercase tracking-wide">Course</th>
                    <th class="text-left px-6 py-4 text-sm font-semibold uppercase tracking-wide">Amount</th>
                    <th class="text-center px-6 py-4 text-sm font-semibold uppercase tracking-wide">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($payments as $payment)
                    <tr class="border-t hover:bg-gray-100 transition-all duration-150">
                        <td class="px-6 py-4 text-gray-700">{{ $payment->id }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $payment->kursus->title }}</td>
                        <td class="px-6 py-4 font-semibold text-green-600">Rp.{{ number_format($payment->amount, 2) }}</td>
                        <td class="px-6 py-4 flex justify-center">
                            <span class="inline-block px-4 py-2 text-sm font-semibold rounded-full
                                {{ $payment->payment_status === 'completed' ? 'bg-green-200 text-green-800' : 'bg-yellow-200 text-yellow-800' }}">
                                {{ ucfirst($payment->payment_status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">No payments found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if ($payments->hasPages())
        <div class="mt-8 flex justify-center">
            {{ $payments->links('vendor.pagination.tailwind') }}
        </div>
    @endif
</div>
@endsection
