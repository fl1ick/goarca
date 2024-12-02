<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BerkasInaktif;
use App\Models\BerkasMusnah;
use App\Models\BerkasPermanen;
use App\Models\DaftarAktif;
use App\Models\DaftarArsip;
use App\Models\Jra;
use App\Models\Log;
use App\Models\Kategory;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index(request $request)
    {
        $jras = Jra::get();
        $kategory = kategory::get();
        $logs = Log::orderBy('created_at', 'desc')->paginate(10);
        #dd($logs);
        $Hasiljras = Jra::selectRaw('COUNT(*) as total_data_jras')->first();
        $Hasilkategory = Kategory::selectRaw('COUNT(*) as total_data_kategory')->first();
        $Hasildataarsip = DaftarArsip::selectRaw('COUNT(*) as total_data_daftararsip')->first();
        $Hasilberkaspermanen = BerkasPermanen::selectRaw('COUNT(*) as total_data_berkaspermanen')->first();
        $Hasilberkasinaktif = BerkasInaktif::selectRaw('COUNT(*) as total_data_berkasinaktif')->first();
        $Hasilberkasmusnah = BerkasMusnah::selectRaw('COUNT(*) as total_data_berkasmusnah')->first();

        return view('beranda', compact('Hasiljras', 'Hasilkategory', 'jras', 'kategory','logs','Hasildataarsip', 'Hasilberkaspermanen', 'Hasilberkasinaktif', 'Hasilberkasmusnah'));
    }
}
