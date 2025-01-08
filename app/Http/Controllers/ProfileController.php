<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil pengguna yang sedang login.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        // Mengambil data user yang sedang login
        $user = Auth::user();

        // Mengembalikan view profil dengan data pengguna
        return view('profile.show', compact('user'));
    }

    /**
     * Menampilkan form untuk mengedit profil pengguna.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        // Mengambil data user yang sedang login
        $user = Auth::user();

        // Mengembalikan view edit profil dengan data pengguna
        return view('profile.edit', compact('user'));
    }

    /**
     * Memperbarui informasi profil pengguna.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|confirmed|min:6',
            'profile_picture' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        // Memperbarui data pengguna
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        // Jika ada password baru
        if ($request->filled('password')) {
            $user->password = bcrypt($validatedData['password']);
        }

        // Mengunggah gambar profil jika ada
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui!');
    }
}
