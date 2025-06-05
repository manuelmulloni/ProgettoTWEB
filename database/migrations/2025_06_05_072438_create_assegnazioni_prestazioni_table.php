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
        Schema::create('assegnazioni_prestazioni', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prestazione_id')
                ->constrained('prestazioni')
                ->onDelete('cascade');
            $table->string('utente_id')
                ->references('username')->on('utenti')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assegnazioni_prestazioni');
    }
};
