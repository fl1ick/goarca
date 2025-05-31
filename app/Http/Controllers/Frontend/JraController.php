<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Jra;
use App\Models\Kategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        try {
            $role = Session::get('role');

            if ($role === 'admin') {
                $jrasData = Jra::all();

                return view('page.jras.index', compact('jrasData'));
            } elseif ($role === 'user') {
                $jrasData = Jra::all();

                return view('page.jras.index', compact('jrasData'));
            }

            // Jika belum login (tidak ada session role), tampilkan halaman login
            return view('auth.login');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Jra::create($request->validated());

        return redirect()->route('page.jras.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(jra $jra)
    {
        return view('page.jras.show', compact('jra'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jra $jra)
    {
        $kategories = Kategory::get();
        return view('page.jras.edit', compact('jra', 'kategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, jra $jra)
    {
        $jra->update($request->validated());
        return redirect()->route('page.jras.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jra $jra)
    {
        $jra->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
