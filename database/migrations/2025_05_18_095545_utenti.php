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
        Schema::create('utenti' ,function (Blueprint $table)
        {
            $table->string('username', 20)->primary(); // Chiave primaria della tabella.
            $table->string('password', 255);
            $table->string('nome', 20)->nullable();
            $table->string('cognome', 20)->nullable();
            $table->date('eta')->nullable();
            $table->integer('livello')->default(1);
            $table->string('telefono', 10)->nullable();
            $table->string('idDipartimento', 20)->nullable();
            $table->foreign('idDipartimento')
                ->references('id')
                ->on('dipartimenti')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utenti');

    }
};
