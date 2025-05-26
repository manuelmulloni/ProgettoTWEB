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
        Schema::create('agende', function (Blueprint $table) {
            $table->bigIncrements('id'); // Chiave primaria

            // Foreign key per prestazione
            $table->foreignId('idPrestazione')
                ->constrained('prestazioni')
                ->onDelete('cascade');

            $table->date('data');
            $table->time('orario_inizio');

            // Foreign key per la prenotazione
            $table->foreignId('idPrenotazione')
                ->nullable() // Può essere null se non c'è una prenotazione
                ->constrained('prenotazioni')
                ->onDelete('set null'); // Imposta a null se la prenotazione viene eliminata

            $table->timestamps(); // created_at, updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agende');
    }
};
