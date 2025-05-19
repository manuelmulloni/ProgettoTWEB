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
        Schema::create('prenotazioni', function (Blueprint $table) {
            // Primary key auto-incrementale della tabella.
            $table->bigIncrements('id');
            $table->string('usernameCliente', 20);
            $table->foreign('usernameCliente')
                ->references('username')
                ->on('utenti')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            // foreign key -> punta a Clienti(username)
            $table->date('data'); // data assegnata dallo staff
            $table->time('ora_inizio');
            $table->time('orafine'); // calcolata = ora_inizio + 1h
            $table->string('durata')->default('01:00:00');
            $table->string('nomePrestazione', 70);
            $table->foreign('nomePrestazione')
                ->references('nome')
                ->on('prestazioni')
                ->onDelete('cascade');
            // foreign key -> punta a Prestazioni(nome)
            //$table->string('nomeDipartimento', 20); // foreign key -> punta a Dipartimenti(nome)
        });
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
