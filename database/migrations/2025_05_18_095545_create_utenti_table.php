<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('utenti', function (Blueprint $table) {
            $table->string('username', 20)->primary();
            $table->string('password', 255);
            $table->string('nome', 20)->nullable();
            $table->string('cognome', 20)->nullable();
            $table->date('eta')->nullable();
            $table->integer('livello')->default(1);
            $table->string('telefono', 10)->nullable();

            $table->foreignId('idDipartimento')
                ->nullable()
                ->constrained('dipartimenti') // Assumendo che la tabella si chiami 'dipartimenti'
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('utenti');
    }
};
