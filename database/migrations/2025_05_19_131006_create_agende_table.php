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
            $table->bigIncrements('id');// Chiave primaria

            // Collega a 'prestazioni.id'
            $table->foreignId('idPrestazione')
                ->constrained('prestazioni')
                ->onDelete('cascade');

            $table->date('data');
            $table->time('orario_inizio');

            $table->string('usernamePaziente', 20)->nullable();
            $table->foreign('usernamePaziente')
                  ->references('username')
                  ->on('utenti')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->timestamp();
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
