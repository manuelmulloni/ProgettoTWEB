<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Prestazione extends Model
{
    public $table = "prestazioni";
    public $timestamps = false;
    protected $fillable = [
        'id',
        'nome',
        'descrizione',
    ];



}
