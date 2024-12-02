<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;


class TatacaraController extends Controller
{
    public function index()
    {
        return view('page.tatacara.index');
    }
}
