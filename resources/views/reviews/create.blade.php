@extends('layouts.main_student')

@section('content')
<div class="max-w-3xl mx-auto py-10">
    <div class="bg-white shadow-lg rounded-xl p-8">
        <h2 class="text-4xl font-bold text-gray-800 mb-8 text-center">Buat Review</h2>

        <!-- Error Alerts -->
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-6">
                <h3 class="font-semibold text-lg">Terjadi Kesalahan:</h3>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('reviews.store') }}" method="POST" class="space-y-8">
            @csrf

            <!-- Course Selection -->
            <div>
                <label for="kursus_id" class="block text-lg font-medium text-gray-700">Pilih Kursus</label>
                <select id="kursus_id" name="kursus_id"
                        class="mt-2 block w-full px-4 py-3 border border-gray-300 bg-gray-50 rounded-lg shadow focus:ring-blue-500 focus:border-blue-500">
                    <option disabled selected>Pilih kursus...</option>
                    @foreach($kursuses as $kursus)
                        <option value="{{ $kursus->id }}">{{ $kursus->title }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Rating -->
            <div>
                <label class="block text-lg font-medium text-gray-700">Rating</label>
                <div class="flex items-center space-x-1 mt-2">
                    @for ($i = 1; $i <= 5; $i++)
                        <label class="cursor-pointer">
                            <input type="radio" name="rating" value="{{ $i }}" class="hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                 class="w-10 h-10 text-gray-400 hover:text-yellow-400 transition duration-200 ease-in-out transform hover:scale-110"
                                 data-rating="{{ $i }}">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 22 12 18.27 5.82 22 7 14.14 2 9.27l6.91-1.01L12 2z" />
                            </svg>
                        </label>
                    @endfor
                </div>
            </div>

            <!-- Comment -->
            <div>
                <label for="comment" class="block text-lg font-medium text-gray-700">Komentar</label>
                <textarea id="comment" name="comment" rows="4"
                          class="mt-2 block w-full px-4 py-3 border border-gray-300 bg-gray-50 rounded-lg shadow focus:ring-blue-500 focus:border-blue-500"
                          placeholder="Tulis ulasan Anda di sini..." required>{{ old('comment') }}</textarea>
            </div>

            <!-- Submit and Cancel Buttons -->
            <div class="flex justify-between items-center">
                <button type="submit"
                        class="inline-flex items-center px-6 py-3 bg-blue-500 hover:bg-blue-600 text-white text-lg font-medium rounded-lg shadow hover:shadow-lg transform hover:scale-105 transition duration-200 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Submit
                </button>
                <a href="{{ route('reviews.index') }}"
                   class="inline-flex items-center px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white text-lg font-medium rounded-lg shadow hover:shadow-lg transform hover:scale-105 transition duration-200 ease-in-out">Cancel</a>
            </div>
        </form>
    </div>
</div>

<script>
    // Update star colors on selection
    document.querySelectorAll('input[name="rating"]').forEach(radio => {
        radio.addEventListener('change', () => {
            const rating = radio.value;
            document.querySelectorAll('svg[data-rating]').forEach(star => {
                const starRating = star.getAttribute('data-rating');
                star.classList.toggle('text-yellow-400', starRating <= rating);
                star.classList.toggle('text-gray-400', starRating > rating);
            });
        });
    });
</script>
@endsection
