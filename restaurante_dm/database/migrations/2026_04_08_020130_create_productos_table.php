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
    Schema::create('productos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');          // Nombre del plato/producto
        $table->decimal('precio', 10, 2);  // Precio con decimales
        $table->text('descripcion')->nullable(); // Descripción opcional
        $table->string('categoria')->nullable(); // Un campo extra para el formulario
        $table->timestamps();
    });
}
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
