<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Kursus;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Index: Menampilkan daftar review
    public function index()
    {
        $reviews = Review::with('kursus', 'user')->latest()->paginate(10);
        return view('reviews.index', compact('reviews'));
    }

    // Create: Form untuk tambah review
    public function create()
    {
        $kursuses = Kursus::all(); // Ambil semua kursus untuk dropdown
        return view('reviews.create', compact('kursuses'));
    }

    // Store: Simpan review ke database
    public function store(Request $request)
    {
        $request->validate([
            'kursus_id' => 'required|exists:kursuses,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);

        Review::create([
            'kursus_id' => $request->kursus_id,
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
            'review_date' => now(),
        ]);

        return redirect()->route('reviews.index')->with('success', 'Review added successfully!');
    }

    // Edit: Form untuk edit review
    public function edit(Review $review)
    {
        $kursuses = Kursus::all();
        return view('reviews.edit', compact('review', 'kursuses'));
    }

    // Update: Update data review
    public function update(Request $request, Review $review)
    {
        $request->validate([
            'kursus_id' => 'required|exists:kursuses,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);

        $review->update([
            'kursus_id' => $request->kursus_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('reviews.index')->with('success', 'Review updated successfully!');
    }

    // Destroy: Hapus review
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully!');
    }
}
