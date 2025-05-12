<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Dipartimento extends Model
{

    public $table = "dipartimenti";
    public $timestamps = false;
    protected $fillable = [
        'idDipartimento',
        'nomeDipartimento'
    ];
}


