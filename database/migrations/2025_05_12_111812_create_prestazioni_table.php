<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prestazioni', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary key auto-increment
            $table->string('nome', 70)->unique();
            $table->text('descrizione');
            $table->string('prescrizioni', 100);
            $table->foreignId('idDipartimento')
                ->constrained('dipartimenti') // attenzione al nome della tabella di riferimento
                ->onDelete('cascade');
            $table->string('usarnameMedico',20);
            $table->foreign('usarnameMedico')
                ->references('usarname')
                ->on('utenti')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prestazioni');
    }
};
