<?php

namespace App\Http\Controllers;
use App\Models\Dipartimento;
use App\Models\User;

class DipartimentoController extends Controller
{

        public function getDipartimenti(){
            $data = Dipartimento::all();
            return view('/dipartimenti', ['List'=>$data]);

        }

    public function getDipendentiDipartimento($nome)
    {
        $dipartimento = Dipartimento::where('nome', $nome)->first();

        if (!$dipartimento) {
            abort(404, 'Dipartimento non trovato');
        }

        $dipendenti = User::where('dipartimento', $dipartimento->nome)
            ->where('livello', 3)
            ->get();

        return view('dipartimenti/show', [
            'dipartimento' => $dipartimento,
            'dipendenti' => $dipendenti,
        ]);
    }
}
