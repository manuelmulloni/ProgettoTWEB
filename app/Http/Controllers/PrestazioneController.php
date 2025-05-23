<?php

namespace App\Http\Controllers;

use App\Models\Prestazione;
use App\Models\Dipartimento;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;

use App\Http\Requests\NewPrestazioneRequest;

class PrestazioneController extends Controller
{

    public function show_prestazioni()
    {
        Log::debug("Starting show_prestazioni method");
        return view('admin.prestazione_create', [
            'prestazioni' => Prestazione::all(),
            'dipartimenti' => Dipartimento::all(),
        ]);
    }

    public function delete_prestazione($id)
    {
        $user = Auth::user();
        if ($user->livello == 4) {
            $prestazione = Prestazione::find($id);
            if ($prestazione) {
                $prestazione->delete();
                return redirect()->back()->with('success', 'Prestazione eliminata con successo.');
            } else {
                return redirect()->back()->with('error', 'Prestazione non trovata.');
            }
        }
    }

    public function create_prestazione(NewPrestazioneRequest $request)
    {
        $user = Auth::user();
        if ($user->livello == 4) {
            Log::debug("Starting create_prestazione method");
            Log::debug("Request data: ", $request->all());
            $prestazione = new Prestazione();
            $prestazione->fill($request->validated());
            $prestazione->save();
            return redirect()->back()->with('success', 'Prestazione creata con successo.');
        }
    }

    public function show_edit_prestazione($id)
        {
          $user = Auth::user();
            if ($user->livello != 4) {
                $prestazione = Prestazione::find($id);
                if ($prestazione) {
                    return view('areaPrestazioni.prestazione_edit', [
                        'id' => $id, // Incluso nell'url, ma laravel da errore se non lo passo
                        'prestazioni' => Prestazione::all(),
                        'prestazione' => $prestazione,
                        'dipartimenti' => Dipartimento::all(),
                    ]);
                } else {
                    return redirect()->back()->with('error', 'Prestazione non trovata.');
                }
            }
    }

    public function edit_prestazione($id, NewPrestazioneRequest $request)
    {
        $user = Auth::user();
        if ($user->livello != 4) {
                Log::debug("Starting edit_prestazione method");
                Log::debug("Request data: ", $request->all());
                Log::debug("Prestazione ID: ", array($id));
                $prestazione = Prestazione::find($id);
                if ($prestazione) {
                    $prestazione->fill($request->validated());
                    $prestazione->save();
                    return redirect()->route('prestazioni')->with('success', 'Prestazione aggiornata con successo.');
                } else {
                    return redirect()->route('prestazioni')->with('error', 'Prestazione non trovata.');
                }
        }
    }

}
