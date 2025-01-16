@extends('layouts.main')

@section('title', 'Edit Payment')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Edit Payment</h2>

    <form action="{{ route('payments.update', $payment->id) }}" method="POST">
        @method('PUT')
        @include('payments.form')
        <button type="submit"
                class="bg-blue-500 text-white font-semibold px-6 py-3 rounded-lg shadow hover:bg-blue-600">
            💾 Update Payment
        </button>
    </form>
</div>
@endsection
