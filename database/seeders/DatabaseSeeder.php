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
            'username' => 'pazipazi',
            'password' => bcrypt('pazipazi'),
            'nome' => 'Giovanni',
            'cognome' => 'Bianchi',
            'dataNascita' => '1985-05-15',
            'livello' => 2,
            'telefono' => '9876543210',
            ],
            [
            'username' => 'staffstaff',
            'password' => bcrypt('staffstaff'),
            'nome' => 'Luca',
            'cognome' => 'Verdi',
            'dataNascita' => '1980-03-20',
            'livello' => 3,
            'telefono' => '1231231234',
            ],
            [
            'username' => 'adminadmin',
            'password' => bcrypt('adminadmin'),
            'nome' => 'Maria',
            'cognome' => 'Rossi',
            'dataNascita' => '1975-07-10',
            'livello' => 4,
            'telefono' => '4564564567',
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
                'medico' => 'medico1',
            ],
            [
                'nome' => 'Visita oculistica',
                'descrizione' => 'Visita oculistica',
                'prescrizioni' => 'Visita oculistica',
                'idDipartimento' => 2,
                'medico' => 'medico1',
            ],
            [
                'nome' => 'Visita ortopedica',
                'descrizione' => 'Visita ortopedica',
                'prescrizioni' => 'Visita ortopedica',
                'idDipartimento' => 3,
                'medico' => 'medico1',
            ]
        ]);

        DB::table("prenotazioni")->insert([
            [
                'usernamePaziente' => 'pazipazi',
                'dataEsclusa' => '2024-01-22',
                'idPrestazione' => 1,
            ],
            [
                'usernamePaziente' => 'pazipazi',
                'dataEsclusa' => '2024-01-23',
                'idPrestazione' => 2,
            ],
            [
                'usernamePaziente' => 'pazipazi',
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
