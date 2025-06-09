<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Str;

class AddUserController extends Controller
{
    public function index()
    {
        try {
            $role = Session::get('role');

            if ($role === 'admin') {
                $users = User::all();
                return view('page.admin.managementuser', compact('users'));
            }

            // Jika belum login (tidak ada session role), tampilkan halaman login
            return view('auth.login');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|unique:users,email',
            'role' => 'required|in:admin,user'
        ]);

        $Token = Str::random(10);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => null,
            'registration_status' => false,
            'token' => $Token,
        ]);

        return redirect()->back()
            ->with('success', 'User sukses dibuat.')
            ->with('created_username', $request->name)
            ->with('created_token', $Token);
    }


    public function resetPassword($id)
    {
        $user = User::findOrFail($id);

        // Generate token baru dan simpan
        $newToken = Str::random(10);
        $user->token = $newToken;
        $user->registration_status = false;
        $user->save();

        // Kirim username dan token ke halaman sebelumnya
        return redirect()->back()->with([
            'reset_success' => true,
            'reset_username' => $user->name,
            'reset_token' => $newToken,
        ]);
    }
}
