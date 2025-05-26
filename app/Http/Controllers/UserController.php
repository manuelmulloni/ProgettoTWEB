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


}
