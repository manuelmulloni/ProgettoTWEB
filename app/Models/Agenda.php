<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    public $table = "agende";

    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false; // non ho i timestamp
    protected $fillable = [
        'giorno_settimana',
        'orario_inizio',
        'orario_fine',
        'idPrestazione',
    ];

    // Relazione con Prestazione
    public function prestazione()
    {
        return $this->belongsTo(Prestazione::class, 'idPrestazione', 'id');
    }




}
