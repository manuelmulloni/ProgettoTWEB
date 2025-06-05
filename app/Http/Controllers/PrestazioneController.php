<?php

namespace App\Http\Controllers;

use App\Models\Prestazione;
use App\Models\Dipartimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

use App\Http\Requests\NewPrestazioneRequest;

class PrestazioneController extends Controller
{

    public function show_prestazione_element($id)
    {
        $prestazione = Prestazione::find($id);

        if ($prestazione) {
            return view('areaPrestazioni.prestazione_info')->with('prestazione', $prestazione);
        } else {
            return redirect()->back()->with('error', 'Prestazione non trovata.');
        }
    }

    public function show_prestazioniCliente()
    {
        Log::debug("Starting show_prestazioni method");
        return view('utenti.prenotazioni', [
            'prestazioni' => Prestazione::paginate(10), // Pagina con 10 prestazioni per volta
            'dipartimenti' => Dipartimento::all(),

        ]);
    }

    public function show_prestazioni()
    {
        Log::debug("Starting show_prestazioni method");
        return view('admin.prestazione_create', [
            'prestazioni' => Prestazione::paginate(10), // Pagina con 10 prestazioni per volta
            'dipartimenti' => Dipartimento::all(),
            'utenti' => DB::table('utenti')->where('livello', 3)->get(),
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
                    return view('areaPrestazioni.prestazione_edit', [ // View non aggiornata
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


    public function dipartimento()
    {
        return $this->belongsTo(Dipartimento::class);
    }
    public function autocomplete(Request $request)
    {
        $query = $request->get('query');

        $results = Prestazione::where('nome', 'LIKE', "%{$query}%")
            ->orWhereHas('dipartimento', function($q) use ($query) {
                $q->where('nome', 'LIKE', "%{$query}%");
            })
            ->select('id', 'nome', 'descrizione', 'prescrizioni', 'medico')
            ->limit(10)
            ->get();

        return response()->json($results);

    }

    public function statsByDip(Request $request)
    {
        $statistiche = Dipartimento::join('prestazioni', 'prestazioni.idDipartimento', '=', 'dipartimenti.id')
            ->join('prenotazioni', 'prestazioni.id', '=', 'prenotazioni.idPrestazione')
            ->select('dipartimenti.nome', DB::raw('COUNT(*) as total'))
            ->groupBy('dipartimenti.nome')
            ->get();

        return response()->view('admin.stats.byDipartimento', [
            'statistiche' => $statistiche,
        ]);
    }

    public function statsByPrestazione(Request $request){
        $statistiche = Prestazione::join('prenotazioni', 'prestazioni.id', '=', 'prenotazioni.idPrestazione')
            ->select('prestazioni.nome',DB::raw('COUNT(*) as total'))
            ->groupBy('prestazioni.nome')
            ->get();

        return response()->view('admin.stats.byPrestazione', [
            'statistiche' => $statistiche,
        ]);
    }

    public function statsByCliente(Request $request){
        $statistiche = Prestazione::join('prenotazioni', 'prestazioni.id', '=', 'prenotazioni.idPrestazione')
            ->select('prenotazioni.usernamePaziente', DB::raw('COUNT(*) as total'))
            ->groupBy('prenotazioni.usernamePaziente')
            ->get();
        return response()->view('admin.stats.byCliente', [
            'statistiche' => $statistiche,
        ]);
    }
}
