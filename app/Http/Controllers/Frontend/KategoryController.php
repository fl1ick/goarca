<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Kategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Excel;

class KategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $role = Session::get('role');

            if ($role === 'admin') {
                // Mengambil semua data kategori tanpa filter untuk keperluan lain jika diperlukan
                $kategory = Kategory::all();  // Opsional jika kamu ingin tetap menggunakan data all
                // Query dasar
                $query = Kategory::query();
                // Memeriksa apakah ada parameter pencarian
                if ($request->has('search')) {
                    $search = $request->input('search');
                    $query->where('kode_kategori', 'like', "%{$search}%")
                        ->orWhere('kategori', 'like', "%{$search}%");
                }
                // Mengambil data dengan pagination, baik hasil pencarian atau semua data
                $kategories = $query->paginate(10);

                // Mengirimkan data hasil paginasi (baik hasil pencarian atau tidak) ke view
                return view('page.kategories.index', compact('kategories'));
            } elseif ($role === 'user') {
                // Mengambil semua data kategori tanpa filter untuk keperluan lain jika diperlukan
                $kategory = Kategory::all();  // Opsional jika kamu ingin tetap menggunakan data all
                // Query dasar
                $query = Kategory::query();
                // Memeriksa apakah ada parameter pencarian
                if ($request->has('search')) {
                    $search = $request->input('search');
                    $query->where('kode_kategori', 'like', "%{$search}%")
                        ->orWhere('kategori', 'like', "%{$search}%");
                }
                // Mengambil data dengan pagination, baik hasil pencarian atau semua data
                $kategories = $query->paginate(10);

                // Mengirimkan data hasil paginasi (baik hasil pencarian atau tidak) ke view
                return view('page.kategories.index', compact('kategories'));
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
        Kategory::create($request->validated());

        return redirect()->route('admin.categories.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategory $kategory) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategory $kategory)
    {
        return view('admin.kategories.edit', compact('kategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategory $kategory)
    {
        $kategory->update($request->validated());

        return redirect()->route('admin.categories.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategory $kategory)
    {
        $kategory->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
