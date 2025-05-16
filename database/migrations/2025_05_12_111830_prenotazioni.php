<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Scema::create('prenotazioni', function (Blueprint $table) {
            // Primary key auto-incrementale della tabella.
            $table->increments('id');
            $table->string('usernameCliente', 20); // foreign key -> punta a Clienti(username)
            $table->time('oraInizio');
            $table->date('giorno');
            $table->string('nomePrestazione', 70); // foreign key -> punta a Prestazioni(nome)
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prenotazioni');
        //
    }
};
