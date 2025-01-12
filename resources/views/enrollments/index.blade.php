@extends('layouts.main')

@section('title', 'Daftar Enrollments')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-left">
        Daftar Enrollments
    </h1>

    @if ($enrollments->isEmpty())
        <p class="text-gray-600 text-center text-lg">Belum ada enrollments yang tersedia.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($enrollments as $index => $enrollment)
            <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-200 hover:shadow-2xl transition-transform transform hover:scale-105">
                <!-- Header Card -->
                <div class="bg-gradient-to-br from-blue-500 to-indigo-500 text-white p-4">
                    <h2 class="text-lg font-bold truncate">
                        {{ $enrollment->kursus->title }}
                    </h2>
                    <span class="absolute top-3 right-3 bg-white text-blue-500 text-xs font-bold px-2 py-1 rounded-full shadow">
                        #{{ $index + 1 }}
                    </span>
                </div>

                <!-- Konten Card -->
                <div class="p-5">
                    <p class="text-sm text-gray-700 mb-3">
                        <span class="font-semibold">Siswa:</span> {{ $enrollment->user->name }}
                    </p>
                    <p class="text-sm text-gray-700 mb-4">
                        <span class="font-semibold">Tanggal Enroll:</span>
                        {{ $enrollment->created_at ? $enrollment->created_at->format('d M Y') : 'Tidak tersedia' }}
                    </p>

                    <!-- Doughnut Chart -->
                    <div class="relative flex items-center justify-center mb-6">
                        <canvas id="progressChart{{ $index }}" class="w-20 h-20"></canvas>
                        <div class="absolute flex flex-col items-center">
                            <span class="text-lg font-bold text-gray-800">
                                {{ $enrollment->progress ?? 0 }}%
                            </span>
                            <p class="text-xs text-gray-500">Selesai</p>
                        </div>
                    </div>

                    <!-- Aksi -->
                    <div class="flex justify-between items-center">
                        <a href="{{ route('enrollments.show', $enrollment->id) }}"
                           class="bg-blue-600 text-white text-sm font-semibold px-4 py-2 rounded-lg shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-300 focus:ring-offset-2">
                            Detail
                        </a>
                        <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus enrollment ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-500 text-white text-sm font-semibold px-4 py-2 rounded-lg shadow hover:bg-red-600 focus:ring-2 focus:ring-red-300 focus:ring-offset-2">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>

<!-- Script untuk Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const enrollments = @json($enrollments);

    enrollments.forEach((enrollment, index) => {
        const ctx = document.getElementById(`progressChart${index}`).getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Completed', 'Remaining'],
                datasets: [{
                    data: [enrollment.progress ?? 0, 100 - (enrollment.progress ?? 0)],
                    backgroundColor: ['#3B82F6', '#E5E7EB'],
                    hoverBackgroundColor: ['#2563EB', '#D1D5DB'],
                    borderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                cutout: '70%',
            }
        });
    });
</script>
@endsection
