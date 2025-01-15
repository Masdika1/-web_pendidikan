<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class InstructorCertificateController extends Controller
{
    // Menampilkan semua sertifikat
    public function index()
    {
        $certificates = Certificate::with('enrollment.user')->latest()->get();
        return view('instructor.certificates.index', compact('certificates'));
    }

    // Menampilkan form tambah sertifikat
    public function create()
    {
        $enrollments = Enrollment::where('progress', 100)->get();
        return view('instructor.certificates.create', compact('enrollments'));
    }

    // Menyimpan sertifikat baru
    public function store(Request $request)
    {
        $request->validate([
            'enrollment_id' => 'required|exists:enrollments,id',
            'certificate_code' => 'required|unique:certificates,certificate_code',
        ]);

        Certificate::create([
            'enrollment_id' => $request->enrollment_id,
            'issue_date' => now(),
            'certificate_code' => $request->certificate_code,
        ]);

        return redirect('/instructor/certificates')->with('success', 'Sertifikat berhasil ditambahkan!');
    }

    // Menghapus sertifikat
    public function delete($id)
    {
        $certificate = Certificate::findOrFail($id);
        $certificate->delete();

        return redirect('/instructor/certificates')->with('success', 'Sertifikat berhasil dihapus.');
    }

    public function show($id)
    {
        $certificate = Certificate::with('enrollment.user', 'enrollment.kursus')->findOrFail($id);
        return view('instructor.certificates.show', compact('certificate'));
    }
}
