<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BerkasAktif;
use Illuminate\Http\Request;

class BerkasAktifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berkasaktif = BerkasAktif::all(); 
        return view('page.berkasaktif.index', compact('berkasaktif'));
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
    public function show(BerkasAktif $berkasAktif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BerkasAktif $berkasAktif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BerkasAktif $berkasAktif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BerkasAktif $berkasAktif)
    {
        $berkasAktif->delete();
     
        return redirect()->route('aktif')->with('success', 'Data berhasil dihapus.');
    }
}
