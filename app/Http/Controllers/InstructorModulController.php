<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use App\Models\Kursus;
use Illuminate\Http\Request;

class InstructorModulController extends Controller
{
   // Menampilkan daftar modul untuk instruktur
    public function index()
    {
        $moduls = Modul::with('kursus')
            ->whereHas('kursus', function ($query) {
                $query->where('instructor_id', auth()->id());
            })
            ->paginate(10); // Menambahkan pagination

        return view('instructor.moduls.index', compact('moduls'));
    }

    // Menampilkan form untuk membuat modul
    public function create()
    {
        // Menampilkan kursus yang dimiliki oleh instruktur
        $kursuses = Kursus::where('instructor_id', auth()->id())->get();

        return view('instructor.moduls.create', compact('kursuses'));
    }

    // Menyimpan modul baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'kursus_id' => 'required|exists:kursuses,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order_no' => 'required|integer',
        ]);

        // Validasi jika instruktur hanya dapat menambah modul pada kursus miliknya
        $instructorId = auth()->id();
        $kursus = Kursus::where('id', $request->kursus_id)
                        ->where('instructor_id', $instructorId)
                        ->first();

        if (!$kursus) {
            return redirect()->back()->with('error', 'Anda tidak berhak menambahkan modul pada kursus ini.');
        }

        // Membuat modul baru
        Modul::create($request->only(['kursus_id', 'title', 'description', 'order_no']));

        return redirect()->route('instructor.moduls.index')->with('success', 'Modul berhasil dibuat.');
    }

    // Menampilkan form untuk mengedit modul
    public function edit($id)
    {
        $modul = Modul::findOrFail($id);
        $kursuses = Kursus::where('instructor_id', auth()->id())->get();

        return view('instructor.moduls.edit', compact('modul', 'kursuses'));
    }

    // Menyimpan perubahan modul
    public function update(Request $request, $id)
    {
        $request->validate([
            'kursus_id' => 'required|exists:kursuses,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order_no' => 'required|integer',
        ]);

        $modul = Modul::findOrFail($id);

        // Validasi jika instruktur hanya dapat mengubah modul pada kursus miliknya
        $instructorId = auth()->id();
        $kursus = Kursus::where('id', $request->kursus_id)
                        ->where('instructor_id', $instructorId)
                        ->first();

        if (!$kursus) {
            return redirect()->back()->with('error', 'Anda tidak berhak mengubah modul pada kursus ini.');
        }

        // Mengupdate modul
        $modul->update($request->only(['kursus_id', 'title', 'description', 'order_no']));

        return redirect()->route('instructor.moduls.index')->with('success', 'Modul berhasil diperbarui.');
    }

    // Menghapus modul
    public function destroy($id)
    {
        $modul = Modul::findOrFail($id);

        // Validasi jika instruktur hanya dapat menghapus modul pada kursus miliknya
        $instructorId = auth()->id();
        $kursus = Kursus::where('id', $modul->kursus_id)
                        ->where('instructor_id', $instructorId)
                        ->first();

        if (!$kursus) {
            return redirect()->back()->with('error', 'Anda tidak berhak menghapus modul pada kursus ini.');
        }

        $modul->delete();

        return redirect()->route('instructor.moduls.index')->with('success', 'Modul berhasil dihapus.');
    }
}
