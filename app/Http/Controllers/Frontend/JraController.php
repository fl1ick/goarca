<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Jra;
use App\Models\Kategory;
use Illuminate\Http\Request;

class JraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        $jras = Jra::get();
        $query = Jra::query();
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('kode_klasifikasi', 'like', "%{$search}%")
                  ->orWhere('klasifikasi', 'like', "%{$search}%")
                  ->orWhere('nasib', 'like', "%{$search}%")
                  ->orWhereHas('kategory', function ($q) use ($search) {
                      $q->where('kategori', 'like', "%{$search}%");
                  });
        }
        $jras = $query->paginate(25);
        return view('page.jras.index', compact('jras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategories = kategory::get();
        return view('page.jras.create', compact('kategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Jra::create($request->validated() );

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
        return view('page.jras.edit', compact('jra','kategories'));
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
