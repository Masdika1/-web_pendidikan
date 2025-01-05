<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Models\Enrollment;

class CertificateController extends Controller
{
    /**
     * Display a listing of the certificates.
     */
    public function index()
    {
        $certificates = Certificate::with('enrollment.user', 'enrollment.kursus')->get();
        return view('certificates.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new certificate.
     */
    public function create()
    {
        $enrollments = Enrollment::all(); // You can filter based on conditions if needed
        return view('certificates.create', compact('enrollments'));
    }

    /**
     * Store a newly created certificate in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'enrollment_id' => 'required|exists:enrollments,id',
            'certificate_code' => 'required|unique:certificates,certificate_code|max:50',
        ]);

        Certificate::create([
            'enrollment_id' => $request->enrollment_id,
            'certificate_code' => $request->certificate_code,
            'issue_date' => now(),
        ]);

        return redirect()->route('certificates.index')->with('success', 'Certificate created successfully.');
    }

    /**
     * Display the specified certificate.
     */
    public function show(Certificate $certificate)
    {
        return view('certificates.show', compact('certificate'));
    }

    /**
     * Show the form for editing the specified certificate.
     */
    public function edit(Certificate $certificate)
    {
        $enrollments = Enrollment::all();
        return view('certificates.edit', compact('certificate', 'enrollments'));
    }

    /**
     * Update the specified certificate in storage.
     */
    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'enrollment_id' => 'required|exists:enrollments,id',
            'certificate_code' => 'required|unique:certificates,certificate_code,' . $certificate->id . '|max:50',
        ]);

        $certificate->update([
            'enrollment_id' => $request->enrollment_id,
            'certificate_code' => $request->certificate_code,
        ]);

        return redirect()->route('certificates.index')->with('success', 'Certificate updated successfully.');
    }

    /**
     * Remove the specified certificate from storage.
     */
    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return redirect()->route('certificates.index')->with('success', 'Certificate deleted successfully.');
    }
}
