<?php

namespace App\Http\Controllers;

use App\Models\Dipartimento;
use Illuminate\Http\Request;
use App\Models\User;



class UserController extends Controller
{

    // Funzione creazione dipartimento (admin)

    public function createDepartment(Request $request)
    {
        $dipartimento = new Dipartimento();
        $dipartimento->nome = $request->input('name');
        $dipartimento->descrizione = $request->input('description');
        $dipartimento->save();

        return response()->json(['message' => 'Department created successfully.']); // bisognerà mettere view

    }

    // Funzione per modificare dipartimento (admin)
    public function updateDepartment(Request $request, $id) // forse da mettere l'username
    {
        $dipartimento = Dipartimento::find($id);

        if ($dipartimento) {
            $dipartimento->nome = $request->input('name');
            $dipartimento->descrizione = $request->input('description');
            $dipartimento->save();

            return response()->json(['message' => 'Department updated successfully.']);
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
            return response()->json(['message' => 'Department deleted successfully.']);
        } else {
            return response()->json(['message' => 'Department not found.'], 404);
        }

    }

    // Funzione per vedere i dipendenti (admin)
    public function getStaff(){

        return User::where('livello', '=', 3)->get();

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
        return response()->json(['message' => 'Staff created successfully.']);
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

            return response()->json(['message' => 'Staff updated successfully.']);
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
            return response()->json(['message' => 'Staff deleted successfully.']);
        } else {
            return response()->json(['message' => 'Staff not found.'], 404);
        }
    }






}
