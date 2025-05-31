<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BerkasPermanen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BerkasPermanenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $role = Session::get('role');

            if ($role === 'admin') {
                $berkasPermanen = BerkasPermanen::all();

                return view('page.berkaspermanen.index', compact('berkasPermanen'));
            } elseif ($role === 'user') {
                $berkasPermanen = BerkasPermanen::all();

                return view('page.berkaspermanen.index', compact('berkasPermanen'));
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
    public function show(BerkasPermanen $berkasPermanen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BerkasPermanen $berkasPermanen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BerkasPermanen $berkasPermanen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BerkasPermanen $berkasPermanen)
    {
        //
    }
}
