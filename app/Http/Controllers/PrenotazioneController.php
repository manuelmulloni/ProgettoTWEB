<?php

namespace App\Http\Controllers;

use App\Models\Dipartimento;
use App\Models\Prenotazione;
use App\Http\Requests\NewPrenotazioneRequest;
use App\Models\Prestazione;
use App\Models\Agenda;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PrenotazioneController extends Controller
{
    public function showPrenotazioniCliente()
    {
        $prenotazioni = Prenotazione::where('usernamePaziente', Auth::user()->username)->paginate(10);

        Log::debug('Variable: $prenotazioni, value: ' . $prenotazioni);
        foreach ($prenotazioni as $prenotazione) {
            Log::debug('Variable: $prenotazione, value: ' . $prenotazione);
            $agenda = Agenda::where('idPrenotazione', $prenotazione->id)->first();

            Log::debug('Variable: $agenda, value: ' . $agenda);
            if ($agenda) {
                Log::debug('Variable: $agenda, value: ' . $agenda);
                $prenotazione->data = $agenda->data;
                $prenotazione->orario_inizio = $agenda->orario_inizio;
                $prenotazione->isUsed = $agenda->data < now(); // Controlla se la prenotazione è già stata utilizzata
            }
        }

        Log::debug('Variable: $prenotazioni, value: ' . $prenotazioni);
        return view('utenti.prenotazioni', [
            'prenotazioni' => $prenotazioni,
            'dipartimenti' => Dipartimento::all(),
            'prestazioni' => Prestazione::all()
        ]);
    }

    public function showPrenotazioni()
    {
        $prenotazioni = Prenotazione::paginate(10);

        return view('utenti.prenotazioni', [
            'prenotazioni' => $prenotazioni,
            'prestazioni' => Prestazione::all()
        ]);
    }

    public function createPrenotazione(NewPrenotazioneRequest $request)
    {
        $user = Auth::user();
        if ($user->livello == 2) { // Livello 4 per admin, 3 per dipendente
            $prenotazione = new Prenotazione();
            $prenotazione->fill($request->validated());
            $prenotazione->save();
            return redirect()->back()->with('success', 'Prenotazione creata con successo.');
        } else {
            return redirect()->back()->with('error', 'Non hai i permessi per creare una prenotazione.');
        }
    }

    public function deletePrenotazione($id)
    {
        Log::debug('Found prenotazione');
        $prenotazione = Prenotazione::find($id);
        Log::debug('Found agenda');
        $agenda = Agenda::where('idPrenotazione', $id)->first();
        Log::debug('Check if agenda is available');
        if ($prenotazione) {
            Log::debug('Deleting prenotazione');
            if (isset($agenda->data) && $agenda->data < now()) {
                Log::debug('Cannot delete used prenotazione');
                return redirect()->back()->with('error', 'Cannot delete used prenotazione');
            }
            $prenotazione->delete();
            Log::debug('Prenotazione deleted successfully');
            return redirect()->back()->with('success', 'Prenotazione deleted successfully');
        } else {
            Log::debug('Prenotazione not found');
            return redirect()->back()->with('error', 'Prenotazione not found');
        }
    }

    public function editPrenotazione($id)
    {
        $prenotazione = Prenotazione::find($id);
        if ($prenotazione) { // sbagliato probabilmente
            return view('prenotazioni.edit', compact('prenotazione'));
        } else {
            return redirect()->back()->with('error', 'Prenotazione non trovata.');
        }
    }

    public function getPrestazioni($id)
    {
        $prestazioni = Prestazione::where('idDipartimento', $id)->pluck('nome', 'id');
        return response()->json($prestazioni);
    }

    public function store(Request $request)
    {
        $request->validate([
            'idPrestazione' => 'required|exists:prestazioni,id',
        ]);

        Prenotazione::create([
            'idPrestazione' => $request->idPrestazione,
            'usernamePaziente' => Auth::user()->username,
            // 'dataEsclusa' => now(), // oppure da input utente
        ]);

        return redirect()->back()->with('success', 'Prenotazione effettuata con successo!');
    }
}
