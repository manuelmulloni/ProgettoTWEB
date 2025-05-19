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


        DB::table("prestazioni")->insert([
            [
            'nome' => 'Visita',
            'descrizione' => 'Visita',
            ],
            [
            'nome' => 'Analisi del sangue',
            'descrizione' => 'Analisi del sangue',
            ],
            [
            'nome' => 'Radiografia',
            'descrizione' => 'Radiografia',
            ]
        ]);
    }
}
