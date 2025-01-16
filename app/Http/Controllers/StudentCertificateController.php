<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentCertificateController extends Controller
{
    // Menampilkan semua sertifikat
    public function index()
    {
        $user_id = Auth::id(); // Mendapatkan ID user yang sedang login
        $certificates = Certificate::whereHas('enrollment', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->with('enrollment.user', 'enrollment.kursus')->get();

        return view('student.sertifikat.index', compact('certificates'));
    }

    // Menampilkan detail sertifikat
    public function show($id)
    {
        $user_id = Auth::id(); // Mendapatkan ID user yang sedang login
        $certificate = Certificate::whereHas('enrollment', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->with('enrollment.user', 'enrollment.kursus')->findOrFail($id);

        return view('student.sertifikat.show', compact('certificate'));
    }
}
