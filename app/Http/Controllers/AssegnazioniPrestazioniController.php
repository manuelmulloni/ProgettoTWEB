<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssegnazioniPrestazioni;
use App\Models\User;
use App\Http\Requests\AddPrestazioniToUserRequest;
use Illuminate\Support\Facades\Log;

class AssegnazioniPrestazioniController extends Controller
{
    public function updatePrestazioni(AddPrestazioniToUserRequest $request)
    {
        Log::debug('Updating prestazioni for staff', [
            'request' => $request->all(),
        ]);
        $validated = $request->validated();
        Log::debug('Validated data', [
            'validated' => $validated,
        ]);

        $staffIds = $validated['staff'];
        $prestazioneIds = $validated['prestazioni'];

        foreach ($staffIds as $staffId) {

            // Remove existing prestazioni for the staff member
            AssegnazioniPrestazioni::where('utente_id', $staffId)->delete();

            // Attach the new prestazioni
            foreach ($prestazioneIds as $prestazioneId) {
                AssegnazioniPrestazioni::create([
                    'utente_id' => $staffId,
                    'prestazione_id' => $prestazioneId,
                ]);
            }
        }

        return redirect()->route('getStaff')->with('success', 'Prestazioni aggiornate con successo.');
    }

}
