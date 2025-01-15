<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class InstructorReviewController extends Controller
{
    // Menampilkan semua ulasan dan rating
    public function index()
    {
        $reviews = Review::with('user', 'kursus')->latest()->paginate(10);
        return view('instructor.reviews.index', compact('reviews'));
    }

    // Menampilkan detail ulasan
    public function show($id)
    {
        $review = Review::with('user', 'kursus')->findOrFail($id);
        return view('instructor.reviews.show', compact('review'));
    }

    // Menghapus ulasan
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('instructor.reviews.index')->with('success', 'Ulasan berhasil dihapus!');
    }
}
