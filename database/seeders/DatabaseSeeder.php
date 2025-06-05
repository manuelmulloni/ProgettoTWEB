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

        $DEPLOYMENT = 'dev';
        $PASSWORD = $DEPLOYMENT === 'dev' ? 'pass' : 'nlFHnlFH';

        $TODAY = date('Y-m-d');

        // User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/

        DB::table("utenti")->insert([
            [
                'username' => 'pazipazi',
                'password' => bcrypt($PASSWORD),
                'nome' => 'Giovanni',
                'cognome' => 'Bianchi',
                'dataNascita' => '1985-05-15',
                'livello' => 2,
                'telefono' => '9876543210',
                'indirizzo' => 'Via Roma 10, Milano',
            ],
            [
                'username' => 'staffstaff',
                'password' => bcrypt($PASSWORD),
                'nome' => 'Luca',
                'cognome' => 'Verdi',
                'dataNascita' => '1980-03-20',
                'livello' => 3,
                'telefono' => '1231231234',
                'indirizzo' => 'Corso Italia 25, Torino',
            ],
            [
                'username' => 'adminadmin',
                'password' => bcrypt($PASSWORD),
                'nome' => 'Maria',
                'cognome' => 'Rossi',
                'dataNascita' => '1975-07-10',
                'livello' => 4,
                'telefono' => '4564564567',
                'indirizzo' => 'Piazza Duomo 5, Firenze',
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
            ],
            [
                'nome' => 'Dermatologia',
                'descrizione' => 'Dermatologia',
            ]
        ]);


        DB::table("prestazioni")->insert([
            // Prestazioni per Cardiologia (idDipartimento: 1)
            [
                'nome' => 'Visita cardiologica',
                'descrizione' => 'Visita cardiologica generale',
                'prescrizioni' => 'Prescrizioni per visita cardiologica',
                'idDipartimento' => 1,
                'medico' => 'Dr. Rossi',
            ],
            [
                'nome' => 'Elettrocardiogramma (ECG)',
                'descrizione' => 'Registrazione dell\'attività elettrica del cuore',
                'prescrizioni' => 'Indicazioni per ECG',
                'idDipartimento' => 1,
                'medico' => 'Dr. Bianchi',
            ],
            [
                'nome' => 'Ecocardiogramma',
                'descrizione' => 'Ecografia del cuore',
                'prescrizioni' => 'Preparazione per ecocardiogramma',
                'idDipartimento' => 1,
                'medico' => 'Dr. Verdi',
            ],

            // Prestazioni per Oculistica (idDipartimento: 2)
            [
                'nome' => 'Visita oculistica completa',
                'descrizione' => 'Visita per controllo della vista e salute degli occhi',
                'prescrizioni' => 'Prescrizioni per visita oculistica',
                'idDipartimento' => 2,
                'medico' => 'Dr. Gialli',
            ],
            [
                'nome' => 'Esame del fondo oculare',
                'descrizione' => 'Esame della retina e del nervo ottico',
                'prescrizioni' => 'Potrebbe essere necessario dilatare la pupilla',
                'idDipartimento' => 2,
                'medico' => 'Dr. Neri',
            ],
            [
                'nome' => 'Misurazione pressione oculare',
                'descrizione' => 'Screening per glaucoma',
                'prescrizioni' => 'Nessuna preparazione richiesta',
                'idDipartimento' => 2,
                'medico' => 'Dr. Marroni',
            ],

            // Prestazioni per Ortopedia (idDipartimento: 3)
            [
                'nome' => 'Visita ortopedica',
                'descrizione' => 'Visita per problemi muscoloscheletrici',
                'prescrizioni' => 'Prescrizioni per visita ortopedica',
                'idDipartimento' => 3,
                'medico' => 'Dr. Azzurri',
            ],
            [
                'nome' => 'Infiltrazione articolare',
                'descrizione' => 'Iniezione di farmaci direttamente nell\'articolazione',
                'prescrizioni' => 'Potenziale dolore dopo l\'iniezione',
                'idDipartimento' => 3,
                'medico' => 'Dr. Rossi',
            ],
            [
                'nome' => 'Radiografia (RX) articolare',
                'descrizione' => 'Esame radiografico di un\'articolazione',
                'prescrizioni' => 'Nessuna preparazione specifica',
                'idDipartimento' => 3,
                'medico' => 'Dr. Bianchi',
            ],

            // Prestazioni per Dermatologia (idDipartimento: 4)
            [
                'nome' => 'Visita dermatologica',
                'descrizione' => 'Visita per problemi della pelle, capelli e unghie',
                'prescrizioni' => 'Prescrizioni per visita dermatologica',
                'idDipartimento' => 4,
                'medico' => 'Dr. Rossi',
            ],
            [
                'nome' => 'Mappatura nevi',
                'descrizione' => 'Controllo dermatoscopico dei nevi',
                'prescrizioni' => 'Evitare l\'esposizione solare prima dell\'esame',
                'idDipartimento' => 4,
                'medico' => 'Dr. Verdi',
            ],
            [
                'nome' => 'Crioterapia verruche',
                'descrizione' => 'Trattamento delle verruche con azoto liquido',
                'prescrizioni' => 'Possibile formazione di vescicole',
                'idDipartimento' => 4,
                'medico' => 'Dr. Neri',
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
                'data' => $TODAY,
                'orario_inizio' => '09:00:00',
                'idPrestazione' => 1,
                'idPrenotazione' => 1,
            ],
            [
                'data' => $TODAY,
                'orario_inizio' => '10:00:00',
                'idPrestazione' => 1,
                'idPrenotazione' => null,
            ],
            [
                'data' => $TODAY,
                'orario_inizio' => '10:00:00',
                'idPrestazione' => 2,
                'idPrenotazione' => null,
            ],
            [
                'data' => $TODAY,
                'orario_inizio' => '11:00:00',
                'idPrestazione' => 3,
                'idPrenotazione' => null,
            ]
        ]);

        DB::table("notifiche")->insert([
            [
            'username' => 'pazipazi',
            'contenuto' => 'Promemoria: Visita cardiologica il 2024-01-22 alle 09:00.',
            'created_at' => now(),
            ],
            [
            'username' => 'pazipazi',
            'contenuto' => 'Nuova funzionalità disponibile: Prenota online!',
            'created_at' => now(),
            ],
            [
            'username' => 'pazipazi',
            'contenuto' => 'Il tuo referto della visita cardiologica è disponibile.',
            'created_at' => now(),
            ],
            [
            'username' => 'pazipazi',
            'contenuto' => 'Nuovo paziente assegnato per la visita di domani.',
            'created_at' => now(),
            ],
            [
            'username' => 'pazipazi',
            'contenuto' => 'Aggiornamento sistema: Manutenzione programmata.',
            'created_at' => now(),
            ],
            [
            'username' => 'pazipazi',
            'contenuto' => 'Ricorda di portare la documentazione precedente.',
            'created_at' => now(),
            ],
            [
            'username' => 'pazipazi',
            'contenuto' => 'Riunione di reparto programmata per venerdì.',
            'created_at' => now(),
            ],
            [
            'username' => 'pazipazi',
            'contenuto' => 'Nuovo protocollo sanitario disponibile.',
            'created_at' => now(),
            ],
            [
            'username' => 'pazipazi',
            'contenuto' => 'La sua richiesta di cambio appuntamento è stata accettata.',
            'created_at' => now(),
            ],
            [
            'username' => 'pazipazi',
            'contenuto' => 'Aggiornamento turni disponibile.',
            'created_at' => now(),
            ],
        ]);

        DB::table("assegnazioni_prestazioni")->insert([
            [
                'prestazione_id' => 1,
                'utente_id' => 'staffstaff',
            ],
            [
                'prestazione_id' => 2,
                'utente_id' => 'staffstaff',
            ],
            [
                'prestazione_id' => 3,
                'utente_id' => 'staffstaff',
            ],
        ]);


    }
}
