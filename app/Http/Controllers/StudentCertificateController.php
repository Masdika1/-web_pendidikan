<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class StudentCertificateController extends Controller
{
    // Menampilkan semua sertifikat
    public function index()
    {
        $certificates = Certificate::with('enrollment.user', 'enrollment.kursus')->get();
        return view('student.sertifikat.index', compact('certificates'));
    }

    // Menampilkan detail sertifikat
    public function show($id)
    {
        $certificate = Certificate::with('enrollment.user', 'enrollment.kursus')->findOrFail($id);
        return view('student.sertifikat.show', compact('certificate'));
    }
}
