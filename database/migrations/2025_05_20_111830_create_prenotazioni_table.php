<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prenotazioni', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('usernameCliente', 20);
            $table->foreign('usernameCliente')
                ->references('username')
                ->on('utenti')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->date('data');
            $table->time('ora_inizio');
            $table->time('durata')->default('01:00:00');

            $table->foreignId('idPrestazione')
                ->constrained('prestazioni')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prenotazioni');
    }
};
