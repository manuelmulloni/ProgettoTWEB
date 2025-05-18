<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = "utenti"; // per ora

    protected $primaryKey = 'username'; // per ora

    public $incrementing = false; // non ho un id da incrementare

    public $timestamps = false; // non ho i timestamp

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */



    protected $fillable = [  // da completare
        'name',
        'email',
        'password',
        'username',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Funzione creazione dipartimento (admin)

    public function createDepartment(Request $request)
    {
        $dipartimento = new Dipartimento();
        $dipartimento->nome = $request->input('name');
        $dipartimento->descrizione = $request->input('description');
        $dipartimento->save();

        return response()->json(['message' => 'Department created successfully.']);

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


