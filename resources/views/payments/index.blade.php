@extends('layouts.main')

@section('title', 'Payments')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Payments</h1>

    <a href="{{ route('payments.create') }}"
       class="bg-blue-500 text-white font-semibold px-4 py-2 rounded shadow hover:bg-blue-600">
       ➕ Add Payment
    </a>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mt-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full mt-6 border-collapse bg-white shadow-lg rounded-lg">
        <thead class="bg-gray-200">
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">User</th>
                <th class="border px-4 py-2">Kursus</th>
                <th class="border px-4 py-2">Amount</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($payments as $payment)
                <tr class="hover:bg-gray-100">
                    <td class="border px-4 py-2">{{ $payment->id }}</td>
                    <td class="border px-4 py-2">{{ $payment->user->name }}</td>
                    <td class="border px-4 py-2">{{ $payment->kursus->title }}</td>
                    <td class="border px-4 py-2">Rp.{{ number_format($payment->amount, 2) }}</td>
                    <td class="border px-4 py-2">
                        <span class="px-3 py-1 rounded-full
                            {{ $payment->payment_status === 'completed' ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600' }}">
                            {{ ucfirst($payment->payment_status) }}
                        </span>
                    </td>
                    <td class="border px-4 py-2 justify-center flex space-x-2">
                        <a href="{{ route('payments.edit', $payment->id) }}"
                           class="bg-yellow-500 text-white px-4 py-2 rounded shadow hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-500 text-white jus px-4 py-2 rounded shadow hover:bg-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="border px-4 py-2 text-center">No payments found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $payments->links() }}
    </div>
</div>
@endsection
