<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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
        $logs = Log::all();
        #dd($logs);
        $Hasiljras = Jra::selectRaw('COUNT(*) as total_data_jras')->first();
        $Hasilkategory = Kategory::selectRaw('COUNT(*) as total_data_kategory')->first();

        return view('beranda', compact('Hasiljras', 'Hasilkategory', 'jras', 'kategory','logs'));
    }
}
