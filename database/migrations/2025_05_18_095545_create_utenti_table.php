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
            $table->date('dataNascita')->nullable();
            $table->string('indirizzo')->nullable();
            $table->integer('livello')->default(2);
            $table->string('telefono', 10)->nullable();
            $table->string('propic', 20)->default('default.jpg');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('utenti');
    }
};
