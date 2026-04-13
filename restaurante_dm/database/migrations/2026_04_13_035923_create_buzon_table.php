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
        Schema::create('buzon', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');   // Campo para el nombre del cliente
            $table->string('correo');   // Campo para el correo
            $table->text('mensaje');     // Campo para el mensaje/sugerencia
            $table->timestamps();       // Guarda fecha y hora (created_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buzon');
    }
};