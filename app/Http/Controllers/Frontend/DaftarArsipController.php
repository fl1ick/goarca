<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\{DaftarArsip, Jra, Kategory, BerkasAktif, BerkasInaktif, BerkasMusnah, BerkasPermanen};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DaftarArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $role = Session::get('role');

            if ($role === 'admin') {
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
                $kategories = Kategory::all();
                $klasifikasis = [];
                // Jika kategori dipilih, ambil klasifikasi yang terkait
                if ($request->filled('kategori1')) {
                    $klasifikasis = Jra::where('kode_kategori', $request->kategori1)
                        ->select('klasifikasi', 'kode_klasifikasi')
                        ->distinct()
                        ->get();
                }

                return view('page.daftararsip.index', compact('daftararsip', 'kategories', 'klasifikasis'));
            } elseif ($role === 'user') {
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
                $kategories = Kategory::all();
                $klasifikasis = [];
                // Jika kategori dipilih, ambil klasifikasi yang terkait
                if ($request->filled('kategori1')) {
                    $klasifikasis = Jra::where('kode_kategori', $request->kategori1)
                        ->select('klasifikasi', 'kode_klasifikasi')
                        ->distinct()
                        ->get();
                }

                return view('page.daftararsip.index', compact('daftararsip', 'kategories', 'klasifikasis'));
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
        $request->validate([
            'isi_berkas' => 'required|string|max:255',
            'tahun_berkas' => 'required|date',
            'kategori' => 'required|string|exists:kategories,kode',
            'kode_klasifikasi' => 'required|string|max:255',
            'klasifikasi_hidden' => 'required|string',
            'retensi_aktif' => 'required|integer',
            'retensi_inaktif' => 'required|integer',
            'jumlah_retensi' => 'required|integer',
            'nasib' => 'required|string|max:255',
            'unit_olah' => 'required|string|max:255',
        ]);

        // Ambil nama kategori berdasarkan kode
        $kategori = Kategory::where('kode', $request->kategori)->first();
        if (!$kategori) {
            return back()->withErrors(['error' => 'Kategori tidak ditemukan.']);
        }

        // Hitung retensi dan tentukan status
        $tahunBerkas = strtotime($request->tahun_berkas);
        $hasilPenjumlahan = strtotime("+{$request->jumlah_retensi} years", $tahunBerkas);
        $currentDate = time();
        $status = $hasilPenjumlahan > $currentDate ? 'Proses' : 'Inaktif';

        // Siapkan data arsip
        $arsipData = [
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
            'unit_olah' => $request->unit_olah,
        ];

        // Logika berdasarkan nasib
        if ($request->nasib === 'Permanen') {
            // Simpan ke DaftarArsip (jika Proses)
            if ($status === 'Proses') {
                DaftarArsip::updateOrCreate([
                    'isi_berkas' => $arsipData['isi_berkas'],
                    'tahun_berkas' => $arsipData['tahun_berkas'],
                    'kategori' => $arsipData['kategori'],
                    'kode_klasifikasi' => $arsipData['kode_klasifikasi'],
                ], $arsipData);
            }

            // Simpan ke BerkasPermanen
            BerkasPermanen::create($arsipData);

            if ($status === 'Inaktif') {
                BerkasInaktif::create($arsipData);
            }
            $message = 'Data berhasil disimpan ke Berkas Permanen.';
        } else if ($request->nasib === 'Musnah') {
            // Simpan ke DaftarArsip dan BerkasMusnah
            DaftarArsip::create($arsipData);

            if ($status === 'Inaktif') {
                BerkasInaktif::create($arsipData);
            }
            BerkasMusnah::create($arsipData);
            $message = 'Data berhasil disimpan ke Berkas Musnah.';
        } else {
            // Jika nasib lainnya, hanya simpan sesuai status
            if ($status === 'Proses') {
                DaftarArsip::create($arsipData);
            } else {
                BerkasInaktif::create($arsipData);
            }
            $message = 'Data berhasil disimpan dengan nasib lainnya.';
        }

        return redirect()->route('arsip')->with('success', $message);
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
