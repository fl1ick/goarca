<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BerkasMusnah;
use Illuminate\Http\Request;

class BerkasMusnahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data dari tabel BerkasMusnah
        $berkasMusnah = BerkasMusnah::all();

        // Kirim data ke view untuk ditampilkan
        return view('page.berkasmusnah.index', compact('berkasMusnah'));
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
    public function show(BerkasMusnah $berkasMusnah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BerkasMusnah $berkasMusnah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BerkasMusnah $berkasMusnah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BerkasMusnah $berkasMusnah)
    {
        //
    }
}
