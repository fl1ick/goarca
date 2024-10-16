<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\DaftarBerkas;

use Illuminate\Http\Request;

class DaftarBerkasController extends Controller
{
    public function index()
    {
        // Ambil data dengan pagination 10
        $daftarberkas = DaftarBerkas::paginate(10);

        // Kembalikan view dengan data yang sudah dipaginasi
        return view('daftarberkas.index', compact('daftarberkas'));
    }

    public function uploadCsv(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:csv,txt|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'File CSV tidak valid.',
                'errors' => $validator->errors()
            ], 422);
        }

        if ($file = $request->file('file')) {
            $filePath = $file->getRealPath();
            $fileData = array_map('str_getcsv', file($filePath));

            $header = array_map('trim', $fileData[0]);
            unset($fileData[0]);

            foreach ($fileData as $row) {
                if (count($header) !== count($row)) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Jumlah kolom dalam file CSV tidak cocok.',
                    ], 422);
                }

                $data = array_combine($header, $row);

                DaftarBerkas::create([
                    'isiberkas'    => $data['isiberkas'] ?? null,
                    'tglberkas'    => $data['tglberkas'] ?? null,
                ]);
            }

            return response()->json([
                'status' => true,
                'message' => 'File CSV berhasil diunggah dan data disimpan ke tabel DPS.'
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'File CSV gagal diunggah.'
        ], 500);
    }

    public function prosesKoreksi()
    {
        // Ambil data dari daftarberkas
        $berkasUntukKoreksi = DaftarBerkas::all();
        $sukses = 0;

        foreach ($berkasUntukKoreksi as $berkas) {
            // Koreksi: Pastikan tglberkas tidak di masa depan
            if (Carbon::parse($berkas->tglberkas)->isPast()) {
                // Insert data ke berkasaktif
                BerkasAktif::create([
                    'isiberkas' => $berkas->isiberkas,
                    'tglberkas' => $berkas->tglberkas,
                    'kode_klasifikasi' => $berkas->kode_klasifikasi,
                    'klasifikasi' => $berkas->klasifikasi,
                    'retensi_aktif' => $berkas->retensiaktif,
                    'retensi_inaktif' => $berkas->retensiinaktif,
                    'jumlah_retensi' => $berkas->jmlretensi,
                    'status' => $berkas->status
                ]);

                // Hapus data dari daftarberkas setelah berhasil dipindahkan
                $berkas->delete();
                $sukses++;
            }
        }

        return redirect('/daftarberkas/koreksi')->with('success', "$sukses berkas berhasil dikoreksi dan dipindahkan.");
    }
}
