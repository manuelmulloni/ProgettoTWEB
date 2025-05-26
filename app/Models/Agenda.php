<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Agenda extends Model
{
    public $table = "agende";



    protected $primaryKey = 'id';

    public $timestamps = true; // ho i timestamp
    protected $fillable = [
        'data',
        'orario_inizio',
        'idPrestazione',
        'idPrenotazione',
    ];

    // Relazione con Prestazione
    public function prestazione()
    {
        return $this->belongsTo(Prestazione::class, 'idPrestazione', 'id');
    }

    public function prenotazione()
    {
        return $this->belongsTo(Prenotazione::class, 'idPrenotazione', 'id');
    }




}
