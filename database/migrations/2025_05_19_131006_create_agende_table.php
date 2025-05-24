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

            // Foreign key per utente/paziente
            $table->string('usernamePaziente', 20)->nullable();
            $table->foreign('usernamePaziente')
                ->references('username')
                ->on('users') // Sostituisci con la tabella corretta
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
