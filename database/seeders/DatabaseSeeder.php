<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Prestazione;
//use Illuminate\Container\Attributes\DB;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/

        DB::table("dipartimenti")->insert([
            [
            'nome' => 'Cardiologia',
            'descrizione' => 'Cardiologia',
            ],
            [
            'nome' => 'Oculistica',
            'descrizione' => 'Oculistica',
            ],
            [
            'nome' => 'Ortopedia',
            'descrizione' => 'Ortopedia',
            ]
        ]);

        DB::table("prestazioni")->insert([
            [
            'nome' => 'Visita cardiologica',
            'descrizione' => 'Visita cardiologica',
            'prescrizioni' => 'Visita cardiologica',
            'idDipartimento' => 1,
            ],
            [
            'nome' => 'Visita oculistica',
            'descrizione' => 'Visita oculistica',
            'prescrizioni' => 'Visita oculistica',
            'idDipartimento' => 2,
            ],
            [
            'nome' => 'Visita ortopedica',
            'descrizione' => 'Visita ortopedica',
            'prescrizioni' => 'Visita ortopedica',
            'idDipartimento' => 3,
            ]
        ]);

        DB::table("agende")->insert([
            [
            'giorno_settimana' => 'Lunedì',
            'orario_inizio' => '09:00:00',
            'orario_fine' => '10:00:00',
            'idPrestazione' => 1,
            ],
            [
            'giorno_settimana' => 'Martedì',
            'orario_inizio' => '10:00:00',
            'orario_fine' => '11:00:00',
            'idPrestazione' => 2,
            ],
            [
            'giorno_settimana' => 'Mercoledì',
            'orario_inizio' => '11:00:00',
            'orario_fine' => '12:00:00',
            'idPrestazione' => 3,
            ]
        ]);
    }
}
