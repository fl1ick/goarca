<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\{DaftarArsip, Jra, Kategory, BerkasAktif, BerkasInaktif, BerkasMusnah,BerkasPermanen};
use Illuminate\Http\Request;


class DaftarArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = DaftarArsip::query(); // Mulai query builder dari DaftarArsip

        // Filter berdasarkan request input untuk pencarian
        if ($request->filled('isi_berkas')) {
            $query->where('isi_berkas', 'like', '%' . $request->isi_berkas . '%');
        }

        if ($request->filled('tahun_berkas')) {
            $query->whereYear('tahun_berkas', $request->tahun_berkas); // Pastikan format tahun cocok
        }

        if ($request->filled('kategori1')) {
            $query->where('kategori', $request->kategori1); // Filter berdasarkan kategori
        }

        if ($request->filled('klasifikasi1')) {
            $query->where('kode_klasifikasi', $request->klasifikasi1); // Filter berdasarkan kode klasifikasi
        }

        if ($request->filled('status1')) {
            $query->where('status', $request->status1); // Filter berdasarkan status
        }

        // Ambil data hasil query dengan pagination
        $daftararsip = $query->paginate(10); // Ganti dengan pagination sesuai kebutuhan
        $daftararsip = DaftarArsip::all();

        // Ambil semua kategori dan klasifikasi yang terkait
        $kategories = Kategory::all(); // Semua kategori
        $klasifikasis = [];

        // Jika kategori dipilih, ambil klasifikasi yang terkait
        if ($request->filled('kategori1')) {
            $klasifikasis = Jra::where('kode_kategori', $request->kategori1)
                ->select('klasifikasi', 'kode_klasifikasi')
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
        $request->validate([
            'isi_berkas' => 'required|string|max:255',
            'tahun_berkas' => 'required|date',
            'kategori' => 'required|string',
            'kode_klasifikasi' => 'required|string|max:255',
            'klasifikasi_hidden' => 'required|string',
            'retensi_aktif' => 'required|integer',
            'retensi_inaktif' => 'required|integer',
            'jumlah_retensi' => 'required|integer',
            'nasib' => 'required|string|max:255',
        ]);
    
        // Ambil nama kategori berdasarkan kode yang dipilih
        $kategori = Kategory::where('kode', $request->kategori)->first();
        if (!$kategori) {
            return back()->withErrors(['error' => 'Kategori tidak ditemukan.']);
        }
    
        // Hitung hasil penjumlahan tahun_berkas dengan jumlah_retensi
        $tahunBerkas = strtotime($request->tahun_berkas);
        $hasilPenjumlahan = strtotime("+{$request->jumlah_retensi} years", $tahunBerkas);
    
        // Tentukan tindakan berdasarkan nasib dan hasilPenjumlahan
        $currentDate = time();
        $message = ''; // Pesan sukses untuk SweetAlert
    
        if ($request->nasib === 'Permanen') {
            // Tentukan status berdasarkan hasil penjumlahan
            $status = $hasilPenjumlahan > $currentDate ? 'Proses' : 'Inaktif';
    
            // Simpan ke tabel BerkasPermanen
            $berkasPermanen = BerkasPermanen::create([
                'isi_berkas' => $request->isi_berkas,
                'tahun_berkas' => $request->tahun_berkas,
                'kategori' => $kategori->kategori,
                'kode_klasifikasi' => $request->kode_klasifikasi,
                'klasifikasi' => $request->klasifikasi_hidden,
                'retensi_aktif' => $request->retensi_aktif,
                'retensi_inaktif' => $request->retensi_inaktif,
                'jumlah_retensi' => $request->jumlah_retensi,
                'nasib' => $request->nasib,
                'status' => $status,
            ]);
    
            // Jika status adalah "Inaktif", juga simpan ke tabel BerkasInaktif
            if ($status === 'Inaktif') {
                BerkasInaktif::create([
                    'isi_berkas' => $berkasPermanen->isi_berkas,
                    'tahun_berkas' => $berkasPermanen->tahun_berkas,
                    'kategori' => $berkasPermanen->kategori,
                    'kode_klasifikasi' => $berkasPermanen->kode_klasifikasi,
                    'klasifikasi' => $berkasPermanen->klasifikasi,
                    'retensi_aktif' => $berkasPermanen->retensi_aktif,
                    'retensi_inaktif' => $berkasPermanen->retensi_inaktif,
                    'jumlah_retensi' => $berkasPermanen->jumlah_retensi,
                    'nasib' => $berkasPermanen->nasib,
                    'status' => 'Inaktif',
                ]);
            }
    
            $message = 'Data berhasil disimpan ke Berkas Permanen dengan status "' . $status . '".';
        } elseif ($hasilPenjumlahan > $currentDate) {
            // Simpan ke tabel DaftarArsip dengan status "Proses"
            DaftarArsip::create([
                'isi_berkas' => $request->isi_berkas,
                'tahun_berkas' => $request->tahun_berkas,
                'kategori' => $kategori->kategori,
                'kode_klasifikasi' => $request->kode_klasifikasi,
                'klasifikasi' => $request->klasifikasi_hidden,
                'retensi_aktif' => $request->retensi_aktif,
                'retensi_inaktif' => $request->retensi_inaktif,
                'jumlah_retensi' => $request->jumlah_retensi,
                'nasib' => $request->nasib,
                'status' => 'Proses',
            ]);
            $message = 'Data berhasil disimpan ke Daftar Arsip dengan status "Proses".';
        } else {
            // Simpan ke tabel BerkasInaktif dengan status "Inaktif"
            $berkasInaktif = BerkasInaktif::create([
                'isi_berkas' => $request->isi_berkas,
                'tahun_berkas' => $request->tahun_berkas,
                'kategori' => $kategori->kategori,
                'kode_klasifikasi' => $request->kode_klasifikasi,
                'klasifikasi' => $request->klasifikasi_hidden,
                'retensi_aktif' => $request->retensi_aktif,
                'retensi_inaktif' => $request->retensi_inaktif,
                'jumlah_retensi' => $request->jumlah_retensi,
                'nasib' => $request->nasib,
                'status' => 'Inaktif',
            ]);
    
            if ($request->nasib === 'Musnah') {
                // Juga simpan ke tabel BerkasMusnah
                BerkasMusnah::create([
                    'isi_berkas' => $berkasInaktif->isi_berkas,
                    'tahun_berkas' => $berkasInaktif->tahun_berkas,
                    'kategori' => $berkasInaktif->kategori,
                    'kode_klasifikasi' => $berkasInaktif->kode_klasifikasi,
                    'klasifikasi' => $berkasInaktif->klasifikasi,
                    'retensi_aktif' => $berkasInaktif->retensi_aktif,
                    'retensi_inaktif' => $berkasInaktif->retensi_inaktif,
                    'jumlah_retensi' => $berkasInaktif->jumlah_retensi,
                    'nasib' => $berkasInaktif->nasib,
                    'status' => 'Inaktif',
                ]);
                $message = 'Data berhasil disimpan ke Berkas Inaktif dan Berkas Musnah.';
            } else {
                $message = 'Data berhasil disimpan ke Berkas Inaktif dengan status "Inaktif".';
            }
        }
    
        return redirect()
            ->route('arsip')
            ->with('success', $message);
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
