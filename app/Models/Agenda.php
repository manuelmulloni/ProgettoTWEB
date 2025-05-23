<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Agenda extends Model
{
    public $table = "agenda";



    protected $primaryKey = 'id';

    public $timestamps = false; // non ho i timestamp
    protected $fillable = [
        'data',
        'ora_inizio',
        'ora_fine',
        'idPrestazione',
    ];

    // Relazione con Prestazione
    public function prestazione()
    {
        return $this->belongsTo(Prestazione::class, 'idPrestazione', 'id');
    }


}
