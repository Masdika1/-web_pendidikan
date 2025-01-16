<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class InstructorUserStudentController extends Controller
{
    public function index()
    {
        // Ambil hanya pengguna dengan role 'student'
        $users = User::where('role', 'student')->get();

        return view('instructor.userstudent.index', compact('users'));
    }

    public function create()
    {
        return view('instructor.userstudent.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);
        $user->role = 'student'; // Set role sebagai 'student'
        $user->save();

        return redirect()->route('userstudent.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        // Pastikan hanya menampilkan pengguna dengan role 'student'
        if ($user->role !== 'student') {
            return redirect()->route('userstudent.index')->with('error', 'Pengguna tidak ditemukan.');
        }

        return view('instructor.userstudent.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        // Pastikan hanya menampilkan pengguna dengan role 'student'
        if ($user->role !== 'student') {
            return redirect()->route('userstudent.index')->with('error', 'Pengguna tidak ditemukan.');
        }

        return view('instructor.userstudent.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Pastikan hanya menampilkan pengguna dengan role 'student'
        if ($user->role !== 'student') {
            return redirect()->route('userstudent.index')->with('error', 'Pengguna tidak ditemukan.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        if ($request->filled('password')) {
            $user->password = bcrypt($validated['password']);
        }
        $user->save();

        return redirect()->route('userstudent.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Pastikan hanya menampilkan pengguna dengan role 'student'
        if ($user->role !== 'student') {
            return redirect()->route('userstudent.index')->with('error', 'Pengguna tidak ditemukan.');
        }

        $user->delete();

        return redirect()->route('userstudent.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}