<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modul;
use App\Models\Kursus;

class ModulController extends Controller
{
    // Menampilkan daftar modul untuk kursus tertentu
    public function index()
    {
        $moduls = Modul::all();// Relasi dari model Kursus

        return view('moduls.index', compact('moduls'));
    }

    // Menampilkan form untuk membuat modul baru
    public function create($kursusId)
    {
        $kursus = Kursus::findOrFail($kursusId);

        return view('moduls.create', compact('kursus'));
    }

    // Menyimpan modul baru ke database
    public function store(Request $request, $kursusId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order_no' => 'required|integer',
        ]);

        $kursus = Kursus::findOrFail($kursusId);

        Modul::create([
            'kursus_id' => $kursus->id,
            'title' => $request->title,
            'description' => $request->description,
            'order_no' => $request->order_no,
        ]);

        return redirect()->route('moduls.index', $kursus->id)->with('success', 'Modul berhasil dibuat.');
    }

    // Menampilkan form untuk mengedit modul
    public function edit($id)
    {
        $modul = Modul::findOrFail($id);

        return view('moduls.edit', compact('modul'));
    }

    // Memperbarui data modul
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order_no' => 'required|integer',
        ]);

        $modul = Modul::findOrFail($id);
        $modul->update([
            'title' => $request->title,
            'description' => $request->description,
            'order_no' => $request->order_no,
        ]);

        return redirect()->route('moduls.index', $modul->kursus_id)->with('success', 'Modul berhasil diperbarui.');
    }

    // Menghapus modul dari database
    public function destroy($id)
    {
        $modul = Modul::findOrFail($id);
        $kursusId = $modul->kursus_id;
        $modul->delete();

        return redirect()->route('moduls.index', $kursusId)->with('success', 'Modul berhasil dihapus.');
    }
}
