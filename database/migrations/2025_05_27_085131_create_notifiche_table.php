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
        Schema::create('notifiche', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->foreign('username')
                ->references('username')
                ->on('utenti')
                ->onDelete('cascade');
            $table->string('contenuto');
            $table->boolean('letto')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifiche');
    }
};
