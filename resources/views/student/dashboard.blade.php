@extends('layouts.main_student')

@section('content')

<div class="p-6">
    <h1 class="text-3xl font-bold text-gray-800">Student Dashboard</h1>
    <p class="text-sm text-gray-600 mt-1">Selamat datang, <span class="font-semibold text-blue-500">{{ Auth::user()->name }}</span></p>
</div>

<!-- Carousel Section -->
<div class="mt-10">
    <div class="swiper mySwiper rounded-lg overflow-hidden shadow-lg" style="max-height: 300px;">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="https://i.pinimg.com/736x/9a/4d/76/9a4d76ef25709ac14808e3aaba83333d.jpg"
                    alt="Slide 1"
                    class="w-full h-full object-cover rounded-lg bg-gray-200">
            </div>
            <div class="swiper-slide">
                <img src="https://i.pinimg.com/736x/90/77/59/907759dc10609bafadf77dfb04cda913.jpg" alt="Slide 2" class="w-full h-full object-cover rounded-lg bg-gray-200">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('https://i.pinimg.com/236x/de/be/94/debe949ec68921fe947d5909c0541ac3.jpg') }}" alt="Slide 3" class="w-full h-full object-cover rounded-lg bg-gray-200">
            </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>

<!-- Statistik Section -->
<div class="mt-12 grid gap-8 sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-4">
    <div class="relative bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300 flex items-center justify-between">
        <div>
            <p class="text-sm text-gray-600">Kursus Saya</p>
            <h4 class="text-2xl font-bold text-gray-800 mt-2">5</h4>
        </div>
        <div class="bg-gradient-to-r from-purple-500 to-purple-400 text-white p-3 rounded-full shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd"></path>
            </svg>
        </div>
    </div>

    <div class="relative bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300 flex items-center justify-between">
        <div>
            <p class="text-sm text-gray-600">Total Pendaftar</p>
            <h4 class="text-2xl font-bold text-gray-800 mt-2">250</h4>
        </div>
        <div class="bg-gradient-to-r from-green-500 to-green-400 text-white p-3 rounded-full shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"></path>
            </svg>
        </div>
    </div>

    <div class="relative bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300 flex items-center justify-between">
        <div>
            <p class="text-sm text-gray-600">Total Kursus</p>
            <h4 class="text-2xl font-bold text-gray-800 mt-2">15</h4>
        </div>
        <div class="bg-gradient-to-r from-orange-500 to-orange-400 text-white p-3 rounded-full shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75z"></path>
            </svg>
        </div>
    </div>
</div>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', () => {
        new Swiper('.mySwiper', {
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 3000,
            },
        });
    });
</script>
