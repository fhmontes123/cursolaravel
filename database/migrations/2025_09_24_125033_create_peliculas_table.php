<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->float('costo');
            $table->text('resumen');
            $table->date('estreno');
            $table->timestamps();

            // Añadir relacion 1aN con tabla generos
            $table->unsignedBigInteger('genero_id'); // Crear campo FK entero no negativo
            $table->foreign('genero_id')             // Identificar columna FK 
                ->references('id')                   // Columna PK de la tabla referenciada "generos"
                ->on('generos')                      // Tabla referenciada "generos"
                ->onDelete('cascade');               // Comportamiento al eliminar

            // Añadir relacion 1aN con tabla users
            $table->unsignedBigInteger('user_id'); // Crear campo FK entero no negativo
            $table->foreign('user_id')             // Identificar columna FK 
                ->references('id')                 // Columna PK de la tabla referenciada "users"
                ->on('users')                      // Tabla referenciada "users"
                ->onDelete('cascade');             // Comportamiento al eliminar
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('peliculas');
    }
};
