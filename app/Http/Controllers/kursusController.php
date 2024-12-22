<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\Enrollment;
use App\Models\Review;
use Illuminate\Http\Request;

class KursusController extends Controller
{
    // Menampilkan semua kursus
    public function index()
    {
        $kursuses = Kursus::all(); // Mendapatkan semua kursus
        return view('kursuses.index', compact('kursuses'));
    }

    // Menampilkan detail kursus berdasarkan ID
    public function show($id)
    {
        $kursus = Kursus::with('modules')->findOrFail($id); // Menemukan kursus berdasarkan ID
        $modules = $kursus->moduls; // Mengambil modul terkait kursus
        $reviews = $kursus->reviews; // Mengambil review kursus
        return view('kursuses.show', compact('kursus', 'modules', 'reviews'));
    }

    // Menampilkan form untuk membuat kursus baru
    public function create()
    {
        return view('kursuses.create');
    }

    // Menyimpan kursus baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'instructor_id' => 'required|numeric',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|numeric',
        ]);

        Kursus::create([
            // 'instructor_id' => auth()->id(), // Mengambil ID pengajar yang sedang login
            'instructor_id' => $request->instructor_id,
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'price' => $request->price,
            'created_at' => now(),
        ]);

        return redirect()->route('kursuses.index')->with('success', 'Kursus berhasil dibuat');
    }

    // Menampilkan form untuk mengedit kursus
    public function edit($id)
    {
        $kursus = Kursus::findOrFail($id);
        return view('kursuses.edit', compact('kursus'));
    }

    // Memperbarui data kursus
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $kursus = Kursus::findOrFail($id);
        $kursus->update([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'price' => $request->price,
        ]);

        return redirect()->route('kursuses.index')->with('success', 'Kursus berhasil diperbarui');
    }

    // Menghapus kursus
    public function destroy($id)
    {
        $kursus = Kursus::findOrFail($id);
        $kursus->delete();

        return redirect()->route('kursuses.index')->with('success', 'Kursus berhasil dihapus');
    }

    // Menampilkan halaman enrollment untuk kursus tertentu
    public function enroll($id)
    {
        $kursus = Kursus::findOrFail($id);
        $user_id = auth()->id();

        // Mengecek apakah pengguna sudah terdaftar
        $existingEnrollment = Enrollment::where('user_id', $user_id)->where('kursus_id', $id)->first();
        if ($existingEnrollment) {
            return redirect()->route('kursuses.show', $id)->with('info', 'Anda sudah terdaftar pada kursus ini');
        }

        // Mendaftarkan pengguna pada kursus
        Enrollment::create([
            'user_id' => $user_id,
            'kursus_id' => $id,
            'enrollment_date' => now(),
            'progress' => 0,
        ]);

        return redirect()->route('kursuses.show', $id)->with('success', 'Berhasil mendaftar kursus');
    }

    // Menampilkan form untuk memberikan review pada kursus
    public function review(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        Review::create([
            'kursus_id' => $id,
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
            'review_date' => now(),
        ]);

        return redirect()->route('kursuses.show', $id)->with('success', 'Review berhasil ditambahkan');
    }
}
