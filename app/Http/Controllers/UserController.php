<?php

namespace App\Http\Controllers;

use App\Models\Dipartimento;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Agenda;
use App\Models\Prestazione;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\AssegnazioniPrestazioni;


class UserController extends Controller
{

    public function showEditUser()
    {
        $user = auth()->user();
        return view('utenti.user_modify', ['user' => $user]);
    }

    public function showEditUserAdmin($username)
    {
        $user = User::where('username', $username)->first();
        return view('utenti.user_modify', ['user' => $user]);
    }

    public function editUser(Request $request)
    {

        $request->validate([
            'username' => ['required', 'string', 'max:20', 'exists:utenti,username'],
            'nome' => ['required', 'string', 'max:20'],
            'cognome' => ['required', 'string', 'max:20'],
            'telefono' => ['required', 'string', 'max:10'],
            'indirizzo' => ['required', 'string', 'max:255'],
            'profile_picture' => ['image', 'max:4000'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Solo l'admin può modificare i dati di qualsiasi utente
        if ($request->user()->livello == 4) {
            $user = User::where('username', $request->username)->first();
        } else {
            $user = $request->user();
        }


        $user->nome = $request->input('nome');
        $user->cognome = $request->input('cognome');
        $user->telefono = $request->input('telefono');
        $user->indirizzo = $request->input('indirizzo');

        if (request('password')) {
            $user->password = Hash::make(request('password'));
        }

        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = basename($request->file('profile_picture')->store('profile_pics', 'public'));
            $user->propic = $profilePicturePath;
        }



        $user->save();

        return redirect()->route('cliente')->with('success', 'Profilo aggiornato con successo!');
    }

    public function getUsers(Request $request)
    {
        // Recupera tutti gli utenti
        $utenti = User::paginate(10);

        $mappings = [2 => 'Cliente', 3 => 'Staff', 4 => 'Amministratore'];

        foreach ($utenti as $utente) {
            $utente->livello = $mappings[$utente->livello] ?? 'Sconosciuto';
        }

        return view('admin.getUsers', ['utenti' => $utenti]);
    }

    // Funzione per vedere i dipendenti (admin)
    public function getStaff(Request $request)
    {

        $utenti = User::all()->where('livello', '=', 3);

        foreach ($utenti as $utente) {
            $utente->prestazioni = AssegnazioniPrestazioni::where('utente_id', $utente->username)->get();
        }

        return view('admin.getStaff', ['utenti' => $utenti, 'prestazioni' => Prestazione::all()]);
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

    public function deleteUser(Request $request)
    {
        $username = $request->input('username');
        $user = User::where('username', $username)->first(); //primo risultato possibile

        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'Utente cancellato con successo!');
        } else {
            return redirect()->back()->with('error', 'Utente non trovato.');
        }
    }

    // Funzione per cancellare un membro dello staff(admin)
    public function deleteStaff(Request $request)
    {
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
