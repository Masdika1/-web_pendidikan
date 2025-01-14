<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kursus;
use Illuminate\Support\Facades\Auth;

class InstructorKursusController extends Controller
{
    /**
     * Display a listing of the instructor's courses.
     */
    public function index()
    {
        // Mendapatkan ID instructor yang sedang login
        $instructor_id = Auth::id();

        // Mengambil kursus berdasarkan id_instructor
        $kursuses = Kursus::where('instructor_id', $instructor_id)->get();

        return view('instructor.kursuses.index', compact('kursuses'));
    }

    /**
     * Show the form for creating a new course.
     */
    public function create()
    {
        return view('instructor.kursuses.create');
    }

/**
 * Show the form for editing the specified course.
 */
public function edit($id)
{
    $kursus = Kursus::findOrFail($id);
    return view('instructor.kursuses.edit', compact('kursus'));
}

/**
 * Update the specified course.
 */
public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'category' => 'required|string',
        'price' => 'required|numeric',
        'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $kursus = Kursus::findOrFail($id);

    $picturePath = $kursus->picture;

    // Update gambar jika ada file baru
    if ($request->hasFile('picture')) {
        if ($picturePath) {
            // Hapus gambar lama
            \Storage::disk('public')->delete($picturePath);
        }
        $picturePath = $request->file('picture')->store('kursus_pictures', 'public');
    }

    // Update kursus
    $kursus->update([
        'title' => $request->title,
        'description' => $request->description,
        'category' => $request->category,
        'price' => $request->price,
        'picture' => $picturePath,
    ]);

        return redirect()->route('instructor.kursuses.index')->with('success', 'Kursus berhasil diperbarui!');
    }
    /**
     * Store a newly created course.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|numeric',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        $picturePath = null;

        // Jika ada file yang diunggah, simpan ke storage
        if ($request->hasFile('picture')) {
            $picturePath = $request->file('picture')->store('kursus_pictures', 'public');
        }

        // Menyimpan kursus baru
        Kursus::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'price' => $request->price,
            'picture' => $picturePath,
            'instructor_id' => Auth::id(), // Gunakan field instructor_id
        ]);

        return redirect()->route('instructor.kursuses.index')->with('success', 'Kursus berhasil dibuat!');
    }
}
