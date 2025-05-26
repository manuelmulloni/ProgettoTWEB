<?php
namespace App\Http\Controllers;
use App\Models\Prenotazione;

class PrenotazioneController extends Controller
{
    public function showPrenotazioni(){

        $prenotazioni = Prenotazione::paginate(10); // Pagina con 10 prenotazioni per volta
        return view('prenotazioni.index', compact('prenotazioni'));
        //paginarla per prestazioni
    }

    public function createPrenotazione()
    {
        $pren = new Prenotazione(); // da vedere
        return view('prenotazioni.create');
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




}
