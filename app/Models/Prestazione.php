<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Prestazione extends Model
{
    public $table = "prestazioni";

    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nome',
        'descrizione',
        'prescrizioni',
        'idDipartimento',
        'medico',
    ];

    public function dipartimento()
    {
        return $this->belongsTo(Dipartimento::class, 'idDipartimento', 'id');
    }

    public function medico()
    {
        return $this->belongsTo(User::class, 'medico', 'username');
    }



}
