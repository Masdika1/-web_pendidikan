<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Kursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentPaymentController extends Controller
{
    /**
     * Display the payments for the authenticated student.
     */
    public function index()
    {
        // Fetch only the payments for the logged-in student
        $payments = Payment::where('user_id', Auth::id())
            ->with('kursus')
            ->latest()
            ->paginate(10);

        return view('student.payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new payment.
     */
    public function create()
    {
        // Fetch the courses available for the logged-in student (or enrolled courses)
        $kursuses = Kursus::all(); // Here, you can filter based on the student's enrollments if necessary
        return view('student.payments.index', compact('kursuses'));
    }

    /**
     * Store a newly created payment.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kursus_id' => 'required|exists:kursuses,id',
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0',
            'payment_status' => 'required|string|in:completed,pending',
        ]);

        // Cek apakah kursus ada
        $kursus = Kursus::find($request->kursus_id);

        // Simpan pembayaran ke database
        $payment = Payment::create([
            'user_id' => $request->user_id,
            'kursus_id' => $request->kursus_id,
            'amount' => $request->amount,
            'payment_status' => $request->payment_status,
        ]);

        // Jika pembayaran berhasil, kamu bisa mengarahkan student ke halaman konfirmasi
        return redirect()->route('student.payments.studentPayments')
            ->with('success', 'Pembayaran berhasil! Anda akan mendapatkan akses ke kursus segera.');
    }
}
