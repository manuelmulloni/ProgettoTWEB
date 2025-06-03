<?php
namespace App\Http\Controllers;
use App\Models\Dipartimento;
use App\Models\Prenotazione;
use App\Http\Requests\NewPrenotazioneRequest;
use App\Models\Prestazione;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PrenotazioneController extends Controller
{
    public function showPrenotazioniCliente()
    {
        $prenotazioni = Prenotazione::where('usernamePaziente',Auth::user()->username)->paginate(10);

        return view('utenti.prenotazioni', [
            'prenotazioni' => $prenotazioni,
            'dipartimenti'=> Dipartimento::all(),
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

    public function createPrenotazione( NewPrenotazioneRequest $request)
    {
        $user=Auth::user();
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
        $prenotazione = Prenotazione::find($id);
        if ($prenotazione) {
            $prenotazione->delete();
            return redirect()->back()->with('success', 'Prenotazione eliminata con successo.');
        } else {
            return redirect()->back()->with('error', 'Prenotazione non trovata.');
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
            'prestazione_id' => 'required|exists:prestazioni,id',
        ]);

        Prenotazione::create([
            'idPrestazione' => $request->prestazione_id,
            'usernamePaziente' => Auth::user()->username,
            'dataEsclusa' => now(), // oppure da input utente
        ]);

        return redirect()->back()->with('success', 'Prenotazione effettuata con successo!');
    }

}
