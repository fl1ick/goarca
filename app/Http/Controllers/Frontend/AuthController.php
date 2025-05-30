<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function index()
    {
        try {
            $role = Session::get('role');

            if ($role === 'admin') {
                return redirect()->route('beranda.index');
            } elseif ($role === 'user') {
                return redirect()->route('beranda.index');
            }

            // Jika belum login (tidak ada session role), tampilkan halaman login
            return view('auth.login');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function login(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'username' => 'required|string',
                'password' => 'required|string',
            ]);

            // Cari user berdasarkan username
            $user = User::where('name', $request->input('username'))->first();

            // Cek apakah user ditemukan dan password cocok

            if (!$user || !Hash::check($request['password'], $user->password)) {
                return redirect()->back()->with('error', 'Invalid credentials.');
            }

            // Simpan ke session
            Session::put('name', $user->name);
            Session::put('role', $user->role); // "admin" atau "user"

            // Arahkan sesuai role
            if ($user->role === 'admin') {
                return redirect()->route('beranda.index')->with('success', 'Welcome admin!');
            } elseif ($user->role === 'user') {
                return redirect()->route('beranda.index')->with('success', 'Welcome user!');
            } else {
                return redirect()->route('auth.login')->with('error', 'Role tidak dikenal.');
            }

            // Jika login gagal
            return redirect()->back()->with('error', 'Invalid username or password');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Login failed: ' . $e->getMessage());
        }
    }

    public function logout()
    {
        Session::flush();

        return redirect()->route('auth.login')->with('success', 'Berhasil logout.');
    }
}
