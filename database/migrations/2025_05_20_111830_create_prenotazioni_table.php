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
            

            $table->string('usernamePaziente', 20);
            $table->foreign('usernamePaziente')
                ->references('username')
                ->on('utenti')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->date('dataEsclusa')->nullable();;

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
