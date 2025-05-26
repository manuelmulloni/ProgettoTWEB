<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Dipartimento extends Model
{

    public $table = "dipartimenti";

    protected $primaryKey = 'id';

    public $timestamps = false;
    protected $fillable = [
        'nome',
        'descrizione',
    ];
}


