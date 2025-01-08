@extends('layouts.main_student')

@section('content')
<div class="max-w-2xl mt-8 mx-auto py-10 px-8 bg-gradient-to-r from-white to-gray-100 rounded-xl shadow-xl">
    <h2 class="text-4xl font-bold text-gray-800 mb-8 text-center">Edit Review</h2>

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
    <form action="{{ route('reviews.update', $review->id) }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Hidden Course ID -->
        <input type="hidden" id="kursus_id" name="kursus_id" value="{{ old('kursus_id', $review->kursus_id) }}">

        <!-- Rating -->
        <div>
            <label for="rating" class="block text-lg font-medium text-gray-700">Rating</label>
            <div class="flex items-center space-x-2 mt-2">
                @for ($i = 1; $i <= 5; $i++)
                    <label class="cursor-pointer">
                        <input type="radio" name="rating" value="{{ $i }}" class="hidden"
                               {{ old('rating', $review->rating) == $i ? 'checked' : '' }}>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                             class="w-10 h-10 text-gray-300 hover:text-yellow-400 transition duration-200 ease-in-out transform hover:scale-110"
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
                      placeholder="Tulis ulasan Anda di sini..." required>{{ old('comment', $review->comment) }}</textarea>
        </div>

        <!-- Submit and Cancel Buttons -->
        <div class="flex justify-between items-center mt-6">
            <button type="submit"
                    class="px-8 py-3 bg-gradient-to-r from-blue-500 to-blue-700 text-white text-lg font-medium rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition duration-200 ease-in-out">
                Update Review
            </button>
            <a href="{{ route('reviews.index') }}"
               class="px-8 py-3 bg-gradient-to-r from-blue-500 to-blue-700 text-white text-lg font-medium rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition duration-200 ease-in-out">
                Cancel
            </a>
        </div>
    </form>
</div>

<script>
    // Highlight selected rating stars dynamically
    document.querySelectorAll('input[name="rating"]').forEach(radio => {
        radio.addEventListener('change', () => {
            const rating = radio.value;
            document.querySelectorAll('svg[data-rating]').forEach(star => {
                const starRating = star.getAttribute('data-rating');
                star.classList.toggle('text-yellow-400', starRating <= rating);
                star.classList.toggle('text-gray-300', starRating > rating);
            });
        });
    });

    // Pre-highlight selected stars on page load
    const selectedRating = document.querySelector('input[name="rating"]:checked');
    if (selectedRating) {
        const rating = selectedRating.value;
        document.querySelectorAll('svg[data-rating]').forEach(star => {
            const starRating = star.getAttribute('data-rating');
            star.classList.toggle('text-yellow-400', starRating <= rating);
            star.classList.toggle('text-gray-300', starRating > rating);
        });
    }
</script>
@endsection
