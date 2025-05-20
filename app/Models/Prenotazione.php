<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Prenotazione extends Model
{
    public $table = "prenotazioni";
    protected $primaryKey = 'id';

    // Se vuoi, puoi mettere $timestamps a false se non hai created_at e updated_at
    public $timestamps = false;

    // Campi che si possono assegnare in massa
    protected $fillable = [

        'usernameCliente',
        'data',
        'oraInizio',
        'durata',
        'idPrestazione',

    ];

    // Relazione con Utente (cliente)
    public function cliente()
    {
        return $this->belongsTo(User::class, 'usernameCliente', 'username');
    }

    // Relazione con Prestazione
    public function prestazione()
    {
        return $this->belongsTo(Prestazione::class, 'idPrestazione', 'id');

    }

}
