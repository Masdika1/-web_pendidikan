<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class StudentKursuskuController extends Controller
{
    // Menampilkan kursus yang sudah dibeli
    public function index()
    {
        // Ambil user yang login
        $studentId = Auth::id();

        // Ambil kursus yang sudah dibeli dengan status pembayaran "completed"
        $purchasedCourses = Payment::where('user_id', $studentId)
                                    ->where('payment_status', 'completed')
                                    ->with('kursus')
                                    ->get()
                                    ->pluck('kursus');

        return view('student.kursusku.index', compact('purchasedCourses'));
    }

    public function show($id)
    {
        // Cari kursus berdasarkan ID
        $kursus = Kursus::with('modules')->findOrFail($id);

        // Pastikan kursus telah dibeli oleh student
        $studentId = Auth::id();
        $purchasedCourses = Auth::user()
            ->payments()
            ->where('payment_status', 'completed')
            ->pluck('kursus_id');

        if (!$purchasedCourses->contains($kursus->id)) {
            abort(403, 'Anda tidak memiliki akses ke kursus ini.');
        }

        return view('student.kursusku.show', compact('kursus'));
    }
}
