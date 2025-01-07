<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Modul;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    // Display a listing of lessons
    public function index()
    {
        $lessons = Lesson::with('module')->paginate(10); // Assuming a relationship with 'module'
        return view('lessons.index', compact('lessons'));
    }

    // Show the form for creating a new lesson
    public function create()
    {
        return view('lessons.create');
    }

    // Store a newly created lesson
    public function store(Request $request)
    {
        $request->validate([
            'module_id' => 'required|exists:moduls,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'video_url' => 'nullable|url',
            'order_no' => 'required|integer',
        ]);

        Lesson::create($request->all());
        return redirect()->route('lessons.index')->with('success', 'Lesson created successfully.');
    }

    public function show($id)
    {
        $lesson = Lesson::with('module')->findOrFail($id);
        return view('lessons.show', compact('lesson'));
    }

    public function edit($id)
    {
        $lesson = Lesson::findOrFail($id);
        $modules = Modul::all(); // Get all modules for the dropdown
        return view('lessons.edit', compact('lesson', 'modules'));
    }

    // Update a specific lesson
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'module_id' => 'nullable|exists:modules,id',
            'order_no' => 'required|integer',
            'video_url' => 'nullable|url',
        ]);

        $lesson = Lesson::findOrFail($id);
        $lesson->update($request->all());

        return redirect()->route('lessons.index')->with('success', 'Lesson updated successfully.');
    }

    // Delete a specific lesson
    public function destroy($id)
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->delete();

        return redirect()->route('lessons.index')->with('success', 'Lesson deleted successfully.');
    }
}
