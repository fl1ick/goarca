<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BerkasInaktif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BerkasInaktifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all BerkasInaktif records
        try {
            $role = Session::get('role');

            if ($role === 'admin') {
                $berkasinaktif = Berkasinaktif::all();

                return view('page.berkasinaktif.index', compact('berkasinaktif'));
            } elseif ($role === 'user') {
                $berkasinaktif = Berkasinaktif::all();

                return view('page.berkasinaktif.index', compact('berkasinaktif'));
            }

            // Jika belum login (tidak ada session role), tampilkan halaman login
            return view('auth.login');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BerkasInaktif $berkasInaktif) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BerkasInaktif $berkasInaktif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BerkasInaktif $berkasInaktif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BerkasInaktif $berkasInaktif)
    {
        $berkasInaktif->delete();

        return redirect()->route('inaktif')->with('success', 'Data berhasil dihapus.');
    }
}
