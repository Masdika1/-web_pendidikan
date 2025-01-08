<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\Enrollment;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KursusController extends Controller
{
    // Menampilkan semua kursus
    public function index()
    {
        $kursuses = Kursus::all();
        return view('kursuses.index', compact('kursuses'));
    }

    // Menampilkan detail kursus berdasarkan ID
    public function show($id)
    {
        $kursus = Kursus::with('modules')->findOrFail($id);
        $modules = $kursus->moduls;
        $reviews = $kursus->reviews;
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
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        $picturePath = null;

        // Jika ada file yang diunggah, simpan ke storage
        if ($request->hasFile('picture')) {
            $picturePath = $request->file('picture')->store('kursus_pictures', 'public');
        }

        Kursus::create([
            'instructor_id' => $request->instructor_id,
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'price' => $request->price,
            'picture' => $picturePath,
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
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        $kursus = Kursus::findOrFail($id);
        $picturePath = $kursus->picture;

        // Jika ada file gambar baru, hapus gambar lama dan simpan yang baru
        if ($request->hasFile('picture')) {
            if ($picturePath) {
                Storage::disk('public')->delete($picturePath); // Hapus file lama
            }
            $picturePath = $request->file('picture')->store('kursus_pictures', 'public');
        }

        $kursus->update([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'price' => $request->price,
            'picture' => $picturePath,
        ]);

        return redirect()->route('kursuses.index')->with('success', 'Kursus berhasil diperbarui');
    }

    // Menghapus kursus
    public function destroy($id)
    {
        $kursus = Kursus::findOrFail($id);

        // Hapus gambar jika ada
        if ($kursus->picture) {
            Storage::disk('public')->delete($kursus->picture);
        }

        $kursus->delete();

        return redirect()->route('kursuses.index')->with('success', 'Kursus berhasil dihapus');
    }

    // Menampilkan halaman enrollment untuk kursus tertentu
    public function enroll($id)
    {
        $kursus = Kursus::findOrFail($id);
        $user_id = auth()->id();

        $existingEnrollment = Enrollment::where('user_id', $user_id)->where('kursus_id', $id)->first();
        if ($existingEnrollment) {
            return redirect()->route('kursuses.show', $id)->with('info', 'Anda sudah terdaftar pada kursus ini');
        }

        Enrollment::create([
            'user_id' => $user_id,
            'kursus_id' => $id,
            'enrollment_date' => now(),
            'progress' => 0,
        ]);

        return redirect()->route('kursuses.show', $id)->with('success', 'Berhasil mendaftar kursus');
    }

    // Menambahkan review pada kursus
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
