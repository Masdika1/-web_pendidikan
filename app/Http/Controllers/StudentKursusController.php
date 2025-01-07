<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use Illuminate\Http\Request;

class StudentKursusController extends Controller
{
    /**
     * Tampilkan daftar kursus untuk student.
     */
    public function index()
    {
        // Ambil semua kursus yang tersedia
        $kursuses = Kursus::all();
        return view('student.kursus.index', compact('kursuses'));
    }

    /**
     * Tampilan untuk detail kursus yang ingin dibeli.
     */
    public function show(Kursus $kursus)
    {
        return view('student.kursus.show', compact('kursus'));
    }
}
