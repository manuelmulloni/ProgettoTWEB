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

        DB::table("utenti")->insert([
            [
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'nome' => 'Mario',
                'cognome' => 'Rossi',
                'dataNascita' => '1990-01-01',
                'livello' => 4,
                'telefono' => '1234567890',
            ],
            [
                'username' => 'medico1',
                'password' => bcrypt('medico1'),
                'nome' => 'Mario',
                'cognome' => 'Rossi',
                'dataNascita' => '1990-01-01',
                'livello' => 3,
                'telefono' => '1234567890',
            ]
        ]);

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
                'usernameMedico' => 'medico1',
            ],
            [
                'nome' => 'Visita oculistica',
                'descrizione' => 'Visita oculistica',
                'prescrizioni' => 'Visita oculistica',
                'idDipartimento' => 2,
                'usernameMedico' => 'medico1',
            ],
            [
                'nome' => 'Visita ortopedica',
                'descrizione' => 'Visita ortopedica',
                'prescrizioni' => 'Visita ortopedica',
                'idDipartimento' => 3,
                'usernameMedico' => 'medico1',
            ]
        ]);

        DB::table("prenotazioni")->insert([
            [
                'usernamePaziente' => 'admin',
                'dataEsclusa' => '2024-01-22',
                'idPrestazione' => 1,
            ],
            [
                'usernamePaziente' => 'admin',
                'dataEsclusa' => '2024-01-23',
                'idPrestazione' => 2,
            ],
            [
                'usernamePaziente' => 'admin',
                'dataEsclusa' => '2024-01-24',
                'idPrestazione' => 3,
            ]
        ]);

        DB::table("agende")->insert([
            [
                'data' => '2024-01-22',
                'orario_inizio' => '09:00:00',
                'idPrestazione' => 1,
                'idPrenotazione' => 1,
            ],
            [
                'data' => '2024-01-22',
                'orario_inizio' => '10:00:00',
                'idPrestazione' => 1,
                'idPrenotazione' => null,
            ],
            [
                'data' => '2024-01-23',
                'orario_inizio' => '10:00:00',
                'idPrestazione' => 2,
                'idPrenotazione' => null,
            ],
            [
                'data' => '2024-01-24',
                'orario_inizio' => '11:00:00',
                'idPrestazione' => 3,
                'idPrenotazione' => null,
            ]
        ]);
    }
}
