@extends('layouts.main')

@section('title', 'Add Payment')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Add Payment</h2>

    <form action="{{ route('payments.store') }}" method="POST">
        @include('payments.form')
        <button type="submit"
                class="bg-blue-500 text-white font-semibold px-6 py-3 rounded-lg shadow hover:bg-blue-600">
            💾 Save Payment
        </button>
    </form>
</div>
@endsection
