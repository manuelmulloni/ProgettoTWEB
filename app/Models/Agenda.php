<?php

namespace App\Models;

class Agenda
{
    public $table = "agenda";

    protected $primaryKey = 'id';
    public $incrementing = false; // non ho un id da incrementare
    public $timestamps = false; // non ho i timestamp
    protected $fillable = [
        'username',
        'giorno',
        'oraInizio',
        'oraFine',
        'nomePrestazione',
    ];

    // Relazione con Prestazione
    public function prestazione()
    {
        return $this->belongsTo(Prestazione::class, 'nomePrestazione', 'nome');
    }


}
