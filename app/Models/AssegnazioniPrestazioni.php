<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Prestazione;
use App\Models\User;

/**
 * Class AssegnazioniPrestazioni
 * 
 * @property int $id
 * @property int $prestazione_id
 * @property string $utente_id
 * 
 * @property Prestazioni $prestazioni
 *
 * @package App\Models
 */
class AssegnazioniPrestazioni extends Model
{
	protected $table = 'assegnazioni_prestazioni';
	public $timestamps = false;

	protected $casts = [
		'prestazione_id' => 'int'
	];

	protected $fillable = [
		'prestazione_id',
		'utente_id'
	];

	public function prestazioni()
	{
		return $this->belongsTo(Prestazione::class, 'prestazione_id');
	}

	public function utente()
	{
		return $this->belongsTo(User::class, 'utente_id', 'username');
	}
}
