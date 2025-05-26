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
    public function show_agenda(Request $request)
    {   
        Log::debug("Starting show_agenda method");
        // Recupera gli elementi dell'agenda di oggi
        
        if ($request->has('date')) {
            $date = $request->input('date');
        } else {
            $date = date('Y-m-d'); // Imposta la data di oggi se non è fornita
        }
        
        $agendaElements = Agenda::where('data', $date)->get();
        Log::debug("Agenda elements for today: ", $agendaElements->toArray());
        return view('areaPrestazioni.agenda_add')->with('prestazioni', Prestazione::all())->with('agendaElements', $agendaElements)->with('showDate', $date);
    }

    public function show_agenda_element($id)
    {
        // Trova l'elemento dell'agenda specifico
        $agendaElement = Agenda::find($id);

        if ($agendaElement) {
            return view('areaPrestazioni.agenda_element')->with('agendaElement', $agendaElement);
        } else {
            return redirect()->back()->with('error', 'Elemento dell\'agenda non trovato.');
        }
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
