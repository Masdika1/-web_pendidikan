<?php
namespace App\Http\Controllers;

use App\Models\Modul;
use App\Models\Lesson;
use Illuminate\Http\Request;

class StudentModulController extends Controller
{
    // Display a listing of the moduls
    public function index()
    {
        $moduls = Modul::all(); // Fetch all moduls
        return view('student.modules.index', compact('moduls'));
    }

    // Display a specific modul
    public function show($id)
    {
        // Ambil modul dengan lessons yang terhubung
        $modul = Modul::with('lessons')->findOrFail($id);

        // Mengambil hanya pelajaran pertama atau null jika kosong
        $lesson = $modul->lessons->first();

        return view('student.modules.show', compact('modul', 'lesson'));
    }
}
