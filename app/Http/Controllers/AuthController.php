<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect based on role
            $role = Auth::user()->role;
            if ($role === 'admin') {
                return redirect('/admin/users')->with('success', 'Login berhasil.');
            } elseif ($role === 'student') {
                return redirect('/student/dashboard')->with('success', 'Login berhasil.');
            } elseif ($role === 'instructor') {
                return redirect('/instructor/dashboard')->with('success', 'Login berhasil.');
            }
        }

        return back()->withErrors([
            'email' => 'email yang dimasukkan tidak terdaftar',
            'password' => 'check kembali password yang dimasukkan',
        ]);
    }

    // Menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    // Proses registrasi
    public function register(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // password harus minimal 8 karakter dan ada konfirmasi
        ]);

        // Membuat user baru dan meng-hash password
        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);  // Meng-hash password
        $user->role = 'student';  // Role default adalah 'warga', bisa diganti sesuai kebutuhan
        $user->save();

        // Redirect ke halaman login atau halaman lain setelah registrasi berhasil
        return redirect()->route('login')->with('status', 'Registration successful. Please login.');
    }
}
