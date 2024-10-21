<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\{DaftarArsip,Jra,Kategory};
use Illuminate\Http\Request;

class DaftarArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daftararsip = DaftarArsip::all(); // Mengambil semua data dari tabel DaftarArsip
        $kategories = Kategory::all(); // Ambil semua kategori
        return view('page.daftararsip.index', compact('daftararsip', 'kategories')); // Mengirimkan data ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategories = Kategory::all(); // Ambil semua kategori
        return view('page.daftararsip.index', compact('kategories')); // Kirim variabel kategories ke view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'isi_berkas' => 'required|string|max:255',
            'tahun_berkas' => 'required|integer',
            'kategori' => 'required|string',
            'kode_klasifikasi' => 'required|string',
            'klasifikasi_hidden' => 'required|string', // Ini sekarang diambil dari input hidden
            'retensi_aktif' => 'required|integer',
            'retensi_inaktif' => 'required|integer',
            'jumlah_retensi' => 'required|integer',
            'nasib' => 'required|string',
        ]);

        // Simpan data ke database
        DaftarArsip::create([
            'isi_berkas' => $request->isi_berkas,
            'tahun_berkas' => $request->tahun_berkas,
            'kategori' => $request->kategori,
            'kode_klasifikasi' => $request->kode_klasifikasi,
            'klasifikasi' => $request->klasifikasi_hidden,  // Menggunakan hidden input
            'retensi_aktif' => $request->retensi_aktif,
            'retensi_inaktif' => $request->retensi_inaktif,
            'jumlah_retensi' => $request->jumlah_retensi,
            'nasib' => $request->nasib,
        ]);

        return redirect()->route('arsip')->with('success', 'Data arsip berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DaftarArsip $daftarArsip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DaftarArsip $daftarArsip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DaftarArsip $daftarArsip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DaftarArsip $daftarArsip)
    {
        //
    }
    public function getKlasifikasi($kodeKategori)
    {
        $klasifikasi = Jra::where('kode_kategori', $kodeKategori)->get();
        return response()->json($klasifikasi);
    }

}
