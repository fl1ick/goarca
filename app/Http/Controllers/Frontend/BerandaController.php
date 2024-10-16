<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\jra;
use App\Models\kategory;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index(request $request)
    {
        $jras = Jra::get();
        $kategory = kategory::get();

        $Hasiljras = Jra::selectRaw('COUNT(*) as total_data_jras')->first();
        $Hasilkategory = Kategory::selectRaw('COUNT(*) as total_data_kategory')->first();

        return view('beranda', compact('Hasiljras', 'Hasilkategory', 'jras', 'kategory'));
    }
}
