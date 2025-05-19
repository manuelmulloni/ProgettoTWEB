<?php

namespace App\Http\Controllers;
use App\Models\Prestazione;

use Illuminate\Support\Facades\Log;

use App\Http\Requests\NewPrestazioneRequest;

class PrestazioneController extends Controller
{

    public function show_prestazioni()
    {
        Log::debug("Starting show_prestazioni method");
        return view('area3.prestazione', [
            'prestazioni' => Prestazione::all(),
        ]);
    }

    public function delete_prestazione($id)
    {
        $prestazione = Prestazione::find($id);
        if ($prestazione) {
            $prestazione->delete();
            return redirect()->back()->with('success', 'Prestazione eliminata con successo.');
        } else {
            return redirect()->back()->with('error', 'Prestazione non trovata.');
        }
    }
    
    public function create_prestazione(NewPrestazioneRequest $request)
    {
        Log::debug("Starting create_prestazione method");
        Log::debug("Request data: ", $request->all());
        $prestazione = new Prestazione();
        $prestazione->fill($request->validated());
        $prestazione->save();

        return redirect()->back()->with('success', 'Prestazione creata con successo.');
    }


}
