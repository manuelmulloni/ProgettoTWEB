<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\Prestazione;
use App\Models\Dipartimento;
use App\Models\User;
use App\Models\Notifica;
use App\Models\Prenotazione;
use App\Models\AssegnazioniPrestazioni;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth; // Import the Auth facade

use App\Http\Requests\NewAgendaElementRequest;

class AgendaController extends Controller
{
    //metodo staff
    public function show_agenda(Request $request)
    {
        Log::debug("Starting show_agenda method");

        if ($request->has('date')) {
            $date = $request->input('date');
        } else {
            $date = date('Y-m-d'); // Imposta la data di oggi se non è fornita
        }

        // Get the logged-in user
        $user = Auth::user();

        // Get the prestazioni assigned to the logged-in user
        $prestazioniIds = AssegnazioniPrestazioni::where('utente_id', $user->username)->pluck('prestazione_id');

        // Filter agenda elements based on prestazioni assigned to the user
        $agendaElements = Agenda::where('data', $date)
            ->whereIn('idPrestazione', $prestazioniIds)
            ->paginate(10);

        Log::debug("Agenda elements for today: ", $agendaElements->toArray());

        // Retrieve flash messages
        $successMessage = session('success');
        $errorMessage = session('error');

        $prestazioni = Prestazione::whereIn('id', $prestazioniIds)->get();

        return view('areaPrestazioni.agenda_add')
            ->with('prestazioni', $prestazioni)
            ->with('agendaElements', $agendaElements)
            ->with('showDate', $date)
            ->with('success', $successMessage) // Pass success message to the view
            ->with('error', $errorMessage);   // Pass error message to the view
    }

    //metodo cliente
    public function cancel_appointment($id)
    {
        // Trova l'elemento dell'agenda da cancellare
        $agenda = Agenda::find($id);

        if ($agenda) {

            $idPrenotazione = $agenda->idPrenotazione;
            $utente = Prenotazione::find($idPrenotazione)->cliente;

            $notifica = new Notifica();
            $notifica->username = $utente->username;
            $notifica->contenuto = "L'appuntamento del " . $agenda->data . " alle " . $agenda->orario_inizio . " è stato cancellato.";
            $notifica->save();

            // Elimina l'elemento dell'agenda
            $agenda->idPrenotazione = null;
            $agenda->save();

            return redirect()->route('agenda')->with('success', 'Appuntamento cancellato con successo.');
        } else {
            return redirect()->route('agenda')->with('error', 'Appuntamento non trovato.');
        }
    }

    //metodo staff
    public function add_appointment($id)
    {
        // Trova l'elemento dell'agenda da modificare
        $agenda = Agenda::find($id);

        Log::debug("Adding appointment for agenda element with ID: $id");

        if ($agenda) {

            $prestazione = $agenda->idPrestazione;

            Log::debug("Found agenda element: ", $agenda->toArray());
            Log::debug("Prestazione ID: $prestazione");

            $dataAgenda = $agenda->data;

            $prenotazioni = Prenotazione::where('idPrestazione', $prestazione)
                ->where(function ($query) use ($dataAgenda) {
                    $query->where('dataEsclusa', '!=', $dataAgenda)
                          ->orWhereNull('dataEsclusa');
                })
                ->get();

            Log::debug("Found prenotazioni: ", $prenotazioni->toArray());


            return view('areaPrestazioni.agenda_add_appointment')
                ->with('agendaElement', $agenda)
                ->with('prestazione', $prestazione)
                ->with('prenotazioni', $prenotazioni);
        } else {
            return redirect()->route('agenda')->with('error', 'Elemento dell\'agenda non trovato.');
        }
    }
//metodo staff per aggiungere un appuntamento all'agenda
    public function add_appointment_to_agenda(Request $request, $id)
    {
        Log::debug("Starting add_appointment_to_agenda method");
        Log::debug("Request data: ", $request->all());
        Log::debug("Agenda ID: $id");

        // Trova l'elemento dell'agenda da modificare
        $agenda = Agenda::find($id);

        if ($agenda) {
            // Aggiorna l'ID della prenotazione nell'elemento dell'agenda
            $agenda->idPrenotazione = $request->input('idPrenotazione');
            $agenda->save();
            Log::debug("Updated agenda element with ID: $id");


            $idPrenotazione = $agenda->idPrenotazione;
            $utente = Prenotazione::find($idPrenotazione)->cliente;

            $notifica = new Notifica();
            $notifica->username = $utente->username;
            $notifica->contenuto = "L'appuntamento del " . $agenda->data . " alle " . $agenda->orario_inizio . " è stato aggiunto all'agenda.";
            $notifica->save();


            return redirect()->route('agenda')->with('success', 'Appuntamento aggiunto all\'agenda con successo.');
        } else {
            return redirect()->route('agenda')->with('error', 'Elemento dell\'agenda non trovato.');
        }
    }
// Metodo per visualizzare un elemento specifico dell'agenda
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
//metodo staff per eliminare un elemento dell'agenda
    public function delete_agenda_element($id)
    {
        // Trova l'elemento dell'agenda da eliminare
        $agenda = Agenda::find($id);

        if ($agenda) {

            $idPrenotazione = $agenda->idPrenotazione;

            if ($idPrenotazione) {
                $utente = Prenotazione::find($idPrenotazione)->cliente;

                $notifica = new Notifica();
                $notifica->username = $utente->username;
                $notifica->contenuto = "L'elemento dell'agenda del " . $agenda->data . " alle " . $agenda->orario_inizio . " è stato eliminato.";
                $notifica->save();
            }



            // Elimina l'elemento dell'agenda
            $agenda->delete();
            return redirect()->back()->with('success', 'Elemento dell\'agenda eliminato con successo.');
        } else {
            return redirect()->back()->with('error', 'Elemento dell\'agenda non trovato.');
        }
    }
//metodo staff per creare un nuovo elemento dell'agenda
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

        $agenda->save();
        Log::debug("Agenda instance saved to database");

        return redirect()->back()->with('success', 'Elemento dell\'agenda creato con successo.');
    }
}
