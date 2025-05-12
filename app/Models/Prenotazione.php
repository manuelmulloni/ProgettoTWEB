<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Prenotazione extends Model
{
    public $table = "prenotazioni";
    public $timestamps = false;
    protected $fillable = [
        'idPrenotazione',
        'usernameCliente',
        'idPrestazione', // Questo forse da cambiare
        'dataPrenotazione',
        'oraPrenotazione',
            ];



}
