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
        Schema::create('dipartimenti', function (Blueprint $table) {
            // Primary key auto-incrementale della tabella.
            $table->bigIncrements('id'); // Chiave primaria della tabella.
            $table->string('nome',20)->unique();
            $table->string('descrizione',100);
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dipartimenti');
        //
    }
};
