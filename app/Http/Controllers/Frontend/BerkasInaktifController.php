<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BerkasInaktif;
use Illuminate\Http\Request;

class BerkasInaktifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all BerkasInaktif records
        $berkasinaktif = Berkasinaktif::all(); 
        return view('page.berkasinaktif.index', compact('berkasinaktif'));
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
    public function show(BerkasInaktif $berkasInaktif)
    {
    }

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
