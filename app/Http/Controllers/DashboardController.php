<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Enrollment;
use App\Models\Kursus;
use App\Models\Payment;
use App\Models\Review;

class DashboardController extends Controller
{
    // Dashboard utama
    public function index()
    {
        // Statistik untuk dashboard
        $totalUsers = User::count();
        $totalCourses = Kursus::count();
        $totalEnrollments = Enrollment::count();
        $totalRevenue = Payment::where('payment_status', 'completed')->sum('amount');

        return view('dashboard', [
            'totalUsers' => $totalUsers,
            'totalCourses' => $totalCourses,
            'totalEnrollments' => $totalEnrollments,
            'totalRevenue' => $totalRevenue,
        ]);
    }

    // Daftar kursus
    public function kursuses()
    {
        $courses = Kursus::with('instructor')->paginate(10);

        return view('dashboard.kursus', compact('kursus'));
    }

    // Daftar pengguna
    public function users()
    {
        $users = User::paginate(10);

        return view('dashboard.users', compact('users'));
    }

    // Daftar pembayaran
    public function payments()
    {
        $payments = Payment::with('user', 'kursus')
            ->orderBy('payment_date', 'desc')
            ->paginate(10);

        return view('dashboard.payments', compact('payments'));
    }

    // Ulasan kursus
    public function reviews()
    {
        $reviews = Review::with('kursus', 'user')->paginate(10);

        return view('dashboard.reviews', compact('reviews'));
    }
}
