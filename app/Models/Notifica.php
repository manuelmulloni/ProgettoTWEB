<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Notifica extends Model
{
    protected $table = 'notifiche';

    protected $fillable = [
        'idUtente',
        'contenuto',
        'letto',
    ];

    public function utente()
    {
        return $this->belongsTo(User::class, 'idUtente', 'username');
    }
}
