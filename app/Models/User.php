<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = "utenti"; // per ora

    protected $primaryKey = 'username'; // per ora

    public $incrementing = false; // non ho un id da incrementare

    public $timestamps = false; // non ho i timestamp

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */


    protected $fillable = [
        'username',
        'password',
        'nome',
        'cognome',
        'eta',
        'livello',
        'telefono',
        'idDipartimento',
    ];

    // Relazione con il dipartimento


    public function dipartimentoRelazione()
    {
        return $this->belongsTo(Dipartimento::class, 'idDipartimento', 'id');
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isAdmin(): bool
    {
        return $this->livello == 4;

    }

    public function isStaff(): bool
    {
        return $this->livello == 3;
    }

    public function isCliente(): bool
    {
        return $this->livello == 2;
    }
}
