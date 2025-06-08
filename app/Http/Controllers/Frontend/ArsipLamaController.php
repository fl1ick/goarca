<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BerkasLama;
use App\Models\DaftarArsip;
use App\Models\BerkasMusnah;
use App\Models\BerkasPermanen;
use App\Models\BerkasInaktif;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ArsipLamaController extends Controller
{
    public function index()
    {
        $arsip = BerkasLama::latest()->get();
        return view('page.arsip.lama', compact('arsip'));
    }

    public function reset(Request $request)
    {
        DB::transaction(function () {
            $daftarArsip = DaftarArsip::all();
            foreach ($daftarArsip as $arsip) {
                $data = $arsip->toArray();
                unset($data['id']);
                BerkasLama::create($data);
                $arsip->delete();
            }

            $berkasMusnah = BerkasMusnah::all();
            foreach ($berkasMusnah as $arsip) {
                $data = $arsip->toArray();
                unset($data['id']);
                BerkasLama::create($data);
                $arsip->delete();
            }

            $berkasPermanen = BerkasPermanen::all();
            foreach ($berkasPermanen as $arsip) {
                $data = $arsip->toArray();
                unset($data['id']);
                BerkasLama::create($data);
                $arsip->delete();
            }

            $berkasInaktif = BerkasInaktif::all();
            foreach ($berkasInaktif as $arsip) {
                $data = $arsip->toArray();
                unset($data['id']);
                BerkasLama::create($data);
                $arsip->delete();
            }
        });

        return redirect()->route('arsip.lama')->with('success', 'Semua data berhasil dipindahkan ke Berkas Lama dan data asal dihapus.');
    }
    public function deleteAll()
    {
        BerkasLama::truncate();  // hapus semua data di tabel BerkasLama

        return redirect()->route('arsip.lama')->with('success', 'Semua data arsip lama berhasil dihapus.');
    }
}
