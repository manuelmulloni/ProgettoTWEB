<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\Prestazione;
use App\Models\Dipartimento;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\NewAgendaElementRequest;

class AgendaController extends Controller
{
    public function show_agenda()
    {
        // Recupera tutti gli appuntamenti dalla tabella "agenda"
        $appuntamenti_lunedi = Agenda::where('giorno_settimana', '=', 'Lunedì')->get();
        $appuntamenti_martedi = Agenda::where('giorno_settimana', '=', 'Martedì')->get();
        $appuntamenti_mercoledi = Agenda::where('giorno_settimana', '=', 'Mercoledì')->get();
        $appuntamenti_giovedi = Agenda::where('giorno_settimana', '=', 'Giovedì')->get();
        $appuntamenti_venerdi = Agenda::where('giorno_settimana', '=', 'Venerdì')->get();
        $appuntamenti_sabato = Agenda::where('giorno_settimana', '=', 'Sabato')->get();
        $appuntamenti_domenica = Agenda::where('giorno_settimana', '=', 'Domenica')->get();

        $agende_days = [
            'Lunedi' => $appuntamenti_lunedi,
            'Martedi' => $appuntamenti_martedi,
            'Mercoledi' => $appuntamenti_mercoledi,
            'Giovedi' => $appuntamenti_giovedi,
            'Venerdi' => $appuntamenti_venerdi,
            'Sabato' => $appuntamenti_sabato,
            'Domenica' => $appuntamenti_domenica,
        ];

        // Passa gli appuntamenti alla vista
        return view('area3.agenda_add')->with('agenda_days', $agende_days)->with('prestazioni', Prestazione::all());
    }

    public function delete_agenda_element($id)
    {
        // Trova l'elemento dell'agenda da eliminare
        $agenda = Agenda::find($id);

        if ($agenda) {
            // Elimina l'elemento dell'agenda
            $agenda->delete();
            return redirect()->back()->with('success', 'Elemento dell\'agenda eliminato con successo.');
        } else {
            return redirect()->back()->with('error', 'Elemento dell\'agenda non trovato.');
        }
    }

    public function create_agenda_element(NewAgendaElementRequest $request)
    {
        Log::debug("Starting create_agenda_element method");
        Log::debug("Request data: ", $request->all());
        // Crea un nuovo elemento dell'agenda
        $agenda = new Agenda();
        Log::debug("New Agenda instance created");
        $agenda->fill($request->validated());
        Log::debug("Agenda instance filled with validated data");
        Log::debug("Agenda data: ", $agenda->toArray());

        // Manual fix -> day number to day name
        $mapping = [
            0 => 'Lunedì',
            1 => 'Martedì',
            2 => 'Mercoledì',
            3 => 'Giovedì',
            4 => 'Venerdì',
            5 => 'Sabato',
            6 => 'Domenica',
        ];
        $agenda->giorno_settimana = $mapping[$request->giorno_settimana];

        $agenda->save();
        Log::debug("Agenda instance saved to database");

        return redirect()->back()->with('success', 'Elemento dell\'agenda creato con successo.');
    }
}
