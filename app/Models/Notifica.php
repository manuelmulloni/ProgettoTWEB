<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Notifica extends Model
{
    protected $table = 'notifiche';

    protected $fillable = [
        'username',
        'contenuto',
        'letto',
    ];

    public function username()
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }
}
