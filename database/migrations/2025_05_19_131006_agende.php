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
        $table->id(); // Chiave primaria autoincrementale

        // Prestazione a cui si riferisce l'agenda
        $table->string('nomePrestazione', 70);
        $table->foreign('nomePrestazione')
            ->references('nome')
            ->on('prestazioni')
            ->onDelete('cascade');

        // Giorno della settimana (es. Lunedì, Martedì, ecc.)
        $table->string('giorno_settimana', 10);

        // Orario di inizio dello slot (es. 08:00, 09:00, ecc.)
        $table->time('orario_inizio');

        // Orario di fine slot calcolato automaticamente
        $table->time('orario_fine')->default('09:00:00');

        $table->timestamps();
    });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agende');
    }
};
