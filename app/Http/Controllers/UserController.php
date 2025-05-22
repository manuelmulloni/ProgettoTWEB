<?php

namespace App\Http\Controllers;

use App\Models\Dipartimento;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Agenda;
use App\Models\Prestazione;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{


    public function getDipartimenti (Request $request)
    {
        $query = $request->input('query');
        $dipartimenti = Dipartimento::all(); // Aggiunta la paginazione
             // Aggiunta la paginazione

        return view('admin.getDipartimenti', ['dipartimenti' => $dipartimenti]);

    }
    // Funzione creazione dipartimento (admin)

    public function createDepartment(Request $request)
    {
        $dipartimento = new Dipartimento();
        $dipartimento->nome = $request->input('name');
        $dipartimento->descrizione = $request->input('description');
        $dipartimento->save();

        return redirect()->route('getDipartimenti');
    }

    // Funzione per modificare dipartimento (admin)
    public function updateDepartment(Request $request, $id) // forse da mettere l'username
    {
        $dipartimento = Dipartimento::find($id);

        if ($dipartimento) {
            $dipartimento->nome = $request->input('name');
            $dipartimento->descrizione = $request->input('description');
            $dipartimento->save();

            return redirect()->route('getDipartimenti');
        } else {
            return response()->json(['message' => 'Department not found.'], 404);
        }
    }

    // Funzione per cancellare dipartimento (admin)
    public function deleteDepartment(Request $request, $id)
    {
        $dipartimento = Dipartimento::find($id);

        if ($dipartimento) {
            $dipartimento->delete();
            return redirect()->route('getDipartimenti');
        } else {
            return response()->json(['message' => 'Department not found.'], 404);
        }

    }

    // Funzione per vedere i dipendenti (admin)
    public function getStaff(Request $request){

        $query = $request->input('query');
        $utenti = User::all()->where('livello', '=', 3);
        return view('admin.getStaff', ['utenti' => $utenti]);



    }
    // Funzione per creare i membri dello staff (admin)
    public function createStaffMembers(Request $request)
    {
        $staff = new User;
        $staff->username = $request->input('username');
        $staff->nome = $request->input('nome');
        $staff->cognome = $request->input('cognome');
        $staff->eta = $request->input('eta');
        $staff->telefono = $request->input('telefono');
        $staff->password = Hash::make($request->input('password'));
        $staff->livello = 3; // Livello per lo staff
        $staff->save();
        return redirect()->route('getStaff');
    }

    // Funzione per modificare un membro dello staff (admin)
    public function updateStaff(Request $request, $username)
    {
        $staff = User::where('username', $username)->first();

        if ($staff) {
            $staff->nome = $request->input('nome');
            $staff->cognome = $request->input('cognome');
            $staff->eta = $request->input('eta');
            $staff->genere = $request->input('genere');
            $staff->telefono = $request->input('telefono');
            $staff->email = $request->input('email');

            if ($request->input('password')) {
                $staff->password = Hash::make($request->input('password'));
            }

            $staff->save();

            return redirect()->route('getStaff');
        } else {
            return response()->json(['message' => 'Staff not found.'], 404);
        }
    }


    // Funzione per cancellare un membro dello staff(admin)
    public function deleteStaff(Request $request){
        $username = $request->input('username');
        $staff = User::where('username', $username)->first(); //primo risultato possibile

        if ($staff) {
            $staff->delete();
            return redirect()->route('getStaff');
        } else {
            return response()->json(['message' => 'Staff not found.'], 404);
        }
    }

    // Funzione per vedere prestazioni (admin)
    public function getPrestazioni(Request $request)
    {
        $query = $request->input('query');
        $dipartimento = $request->input('dipartimento');

        $prestazioni = Prestazione::where('idDipartimento', 'LIKE', '%' . $dipartimento . '%')
            ->paginate(10); // Aggiunta la paginazione

        return view('admin.getPrestazioni', ['prestazioni' => $prestazioni]);
    }
    // Funzione per creare prestazioni (admin)
    public function createPrestazioni(Request $request)
    {
        $prestazione = new Prestazione();
        $prestazione->nome = $request->input('nome');
        $prestazione->descrizione = $request->input('descrizione');
        $prestazione->prescrizioni = $request->input('prescrizioni');
        $prestazione->idDipartimento = $request->input('dipartimento');
        $prestazione->save();

        return redirect()->route('getPrestazioni');
    }

    // Funzione per modificare prestazioni (admin)
    public function updatePrestazioni(Request $request, $id)
    {
        $prestazione = Prestazione::find($id);

        if ($prestazione) {
            $prestazione->nome = $request->input('nome');
            $prestazione->descrizione = $request->input('descrizione');
            $prestazione->prescrizioni = $request->input('prescrizioni');
            $prestazione->idDipartimento = $request->input('dipartimento');
            $prestazione->save();

            return redirect()->route('getPrestazioni');        }
        else {
            return response()->json(['message' => 'Prestazione not found.'], 404);
        }
    }

    // Funzione per cancellare prestazioni (admin)
    public function deletePrestazioni(Request $request, $id)
    {
        $prestazione = Prestazione::find($id);

        if ($prestazione) {
            $prestazione->delete();
            return response()->json(['message' => 'Prestazione deleted successfully.']);
        } else {
            return response()->json(['message' => 'Prestazione not found.'], 404);
        }
    }

    // Funzione per vedere le agende (admin)
    public function getAgende()
    {
        $agende = Agenda::all();
        return view('admin/getAgende', ['Agende'=>$agende]); // da aggiungere la view
    }

    // Funzione per creare una prestazione che poi formerà agenda (admin)
    public function createAgenda(Request $request)
    {
        $agenda = new Agenda();
        $agenda->data = $request->input('data');
        $agenda->ora_inizio = $request->input('ora_inizio');
        $agenda->ora_fine = $request->input('ora_fine');
        $agenda->dipartimento = $request->input('dipartimento');
        $agenda->prestazione = $request->input('prestazione');
        $agenda->save();

        return response()->json(['message' => 'Agenda created successfully.']);
    }

    // Funzione per modificare una prestazione che poi formerà agenda (admin)
    public function updateAgenda(Request $request, $id)
    {
        $agenda = Agenda::find($id);

        if ($agenda) {
            $agenda->data = $request->input('data');
            $agenda->ora_inizio = $request->input('ora_inizio');
            $agenda->ora_fine = $request->input('ora_fine');
            $agenda->dipartimento = $request->input('dipartimento');
            $agenda->prestazione = $request->input('prestazione');
            $agenda->save();

            return response()->json(['message' => 'Agenda updated successfully.']);
        } else {
            return response()->json(['message' => 'Agenda not found.'], 404);
        }
    }
    // Funzione per cancellare una prestazione che poi formerà agenda (admin)
    public function deleteAgenda(Request $request, $id)
    {
        $agenda = Agenda::find($id);

        if ($agenda) {
            $agenda->delete();
            return response()->json(['message' => 'Agenda deleted successfully.']);
        } else {
            return response()->json(['message' => 'Agenda not found.'], 404);
        }
    }






}
