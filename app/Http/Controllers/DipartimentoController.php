<?php

namespace App\Http\Controllers;

use App\Models\Dipartimento;
use App\Models\Prestazione;
use App\Models\User;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\NewDipartimentoRequest;

class DipartimentoController extends Controller
{

    public function getDipartimenti()
    {
        $data = Dipartimento::all();
        if (auth()->check() && auth()->user()->livello == 4) {
            return view('admin.dipartimento_create', ['List' => $data]); // da rivedere
        } else {
            return view('dipartimenti', ['List' => $data]);
        }
    }


    public function getDipendentiDipartimento($id)
    {
        $dipartimento = Dipartimento::find($id);

        if (!$dipartimento) {
            abort(404, 'Dipartimento non trovato');
        }

        $prestazioni = Prestazione::where('idDipartimento', $id)->get();

        return view('datiDipartimento', [
            'dipartimento' => $dipartimento,
            'prestazioni' => $prestazioni,
        ]);
    }

    public function ajaxDescrizioneDipartimento(int $id): JsonResponse
    {
        $dipartimento = Dipartimento::find($id);

        if (!$dipartimento) {
            return response()->json(['error' => 'Dipartimento non trovato'], 404);
        }

        return response()->json([
            'descrizione' => $dipartimento->descrizione,
        ]);
    }

    public function newDipartimento(NewDipartimentoRequest $request)
    {
        $dipartimento = new Dipartimento();
        $dipartimento->fill($request->validated());
        $dipartimento->save();

        return redirect()->route('dipartimentiAdmin')->with('success', 'Dipartimento creato con successo!');
    }
}
