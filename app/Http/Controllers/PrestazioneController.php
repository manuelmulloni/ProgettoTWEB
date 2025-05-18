<?php

namespace App\Http\Controllers;
use App\Models\Prestazione;

class PrestazioneController extends Controller
{

    public function show_prestazioni()
    {
        return view('area2.prestazione', [
            'prestazioni' => Prestazione::all(),
        ]);
    }


}
