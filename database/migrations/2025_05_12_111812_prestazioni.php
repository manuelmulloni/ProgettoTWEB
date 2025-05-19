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
        Schema::create('prestazioni', function (Blueprint $table) {

                $table->bigIncrements('id'); // Primary key auto-incrementata della tabella.
                $table->string('nome', 70); // Nome della prestazione.
                $table->text('descrizione');
                $table->string('prescrizioni', 100);
                $table->string('nomeDipartimento', 20);
                $table->foreign('nomeDipartimeento')
                    ->references('dipartimenti')
                    ->on('nome')
                    ->onDelete('cascade');// Tipologia della prestazione.
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestazioni');
        //
    }
};
