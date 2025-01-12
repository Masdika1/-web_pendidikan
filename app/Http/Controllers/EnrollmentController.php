<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Kursus;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::with('course', 'user')->get();
        return view('enrollments.index', compact('enrollments'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('enrollments.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'user_id' => 'required|exists:users,id',
        ]);

        Enrollment::create($validated);

        return redirect()->route('enrollments.index')->with('success', 'Enrollment successfully created.');
    }

    public function show($id)
    {
        $enrollment = Enrollment::with('course', 'user')->findOrFail($id);
        return view('enrollments.show', compact('enrollment'));
    }

    public function edit($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $courses = Kursus::all();
        return view('enrollments.edit', compact('enrollment', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $enrollment = Enrollment::findOrFail($id);
        $enrollment->update($validated);

        return redirect()->route('enrollments.index')->with('success', 'Enrollment successfully updated.');
    }

    public function destroy($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->delete();

        return redirect()->route('enrollments.index')->with('success', 'Enrollment successfully deleted.');
    }

    public function getProgressAttribute()
    {
        $completedModules = $this->completedModules(); // Sesuaikan dengan logika Anda
        $totalModules = $this->kursus->modules()->count();

        return $totalModules > 0 ? round(($completedModules / $totalModules) * 100) : 0;
    }

}
