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
    public function index(Request $request)
    {
        $query = DaftarArsip::query(); // Mulai query builder dari DaftarArsip
    
        // Menambahkan filter berdasarkan request input
        if ($request->filled('isi_berkas')) {
            $query->where('isi_berkas', 'like', '%' . $request->isi_berkas . '%');
        }
    
        if ($request->filled('tahun_berkas')) {
            $query->where('tahun_berkas', $request->tahun_berkas);
        }
    
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }
    
        if ($request->filled('klasifikasi')) {
            $query->where('klasifikasi', $request->klasifikasi);
        }
    
        if ($request->filled('nasib')) {
            $query->where('nasib', 'like', '%' . $request->nasib . '%');
        }
    
        // Ambil data hasil query dengan pagination
        $daftararsip = $query->paginate(10); // Ganti dengan pagination sesuai kebutuhan
    
        // Ambil semua kategori dan klasifikasi yang terkait
        $kategories = Kategory::all(); // Semua kategori
        $klasifikasis = [];
    
        // Jika kategori dipilih, ambil klasifikasi yang terkait
        if ($request->filled('kategori')) {
            $klasifikasis = DaftarArsip::where('kategori', $request->kategori)
                                       ->select('klasifikasi')
                                       ->distinct()
                                       ->get();
        }
    
        return view('page.daftararsip.index', compact('daftararsip', 'kategories', 'klasifikasis')); // Mengirimkan data ke view
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategories = Kategory::all(); // Ambil semua kategori
        return view('page.daftararsip.create', compact('kategories')); // Kirim variabel kategories ke view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'isi_berkas' => 'required|string|max:255',
            'tahun_berkas' => 'required|date',
            'kategori' => 'required|string',
            'kode_klasifikasi' => 'required|string|max:255',
            'klasifikasi_hidden' => 'required|string', // Mengubah dari longtext ke string
            'retensi_aktif' => 'required|integer',
            'retensi_inaktif' => 'required|integer',
            'jumlah_retensi' => 'required|integer',
            'nasib' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);
    
        // Ambil nama kategori berdasarkan kode yang dipilih
        $kategori = Kategory::where('kode', $request->kategori)->first(); // Ambil nama kategori
        
        if (!$kategori) {
            return back()->withErrors(['error' => 'Kategori tidak ditemukan.']);
        }
    
        // Simpan data arsip dengan nama kategori, bukan kode kategori
        DaftarArsip::create([
            'isi_berkas' => $request->isi_berkas,
            'tahun_berkas' => $request->tahun_berkas,
            'kategori' => $kategori->kategori, // Simpan nama kategori
            'kode_klasifikasi' => $request->kode_klasifikasi,
            'klasifikasi' => $request->klasifikasi_hidden,
            'retensi_aktif' => $request->retensi_aktif,
            'retensi_inaktif' => $request->retensi_inaktif,
            'jumlah_retensi' => $request->jumlah_retensi,
            'nasib' => $request->nasib,
            'status' => $request->status,
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
        // Hapus data arsip
        $daftarArsip->delete();
     
        return redirect()->route('arsip')->with('success', 'Data arsip berhasil dihapus.');
     }
     
    public function getKlasifikasi($kodeKategori)
    {
        $klasifikasi = Jra::where('kode_kategori', $kodeKategori)->get();
        return response()->json($klasifikasi);
    }

}
