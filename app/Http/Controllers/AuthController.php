<?php

namespace App\Http\Controllers;

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
                return redirect('/');
            } elseif ($role === 'instructor') {
                return redirect('/');
            }
        }

        return back()->withErrors([
            'email' => 'email yang dimasukkan tidak terdaftar',
            'password' => 'check kembali password yang dimasukkan',
        ]);
    }
}
