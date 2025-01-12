<?php
namespace App\Http\Controllers;

use App\Models\Modul;
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
        $modul = Modul::findOrFail($id); // Fetch modul by ID or fail
        return view('student.modules.show', compact('modul'));
    }
}
