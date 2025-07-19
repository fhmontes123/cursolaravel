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
        Schema::create('imagenes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            // Relacion de 1 a N con peliculas
            $table->unsignedBigInteger('pelicula_id'); // no negativos
            $table->foreign('pelicula_id') // Identifica columna FK
                ->references('id')       // Columna PK en la tabla peliculas
                ->on ('peliculas')       // Tabla referenciada peliculas
                ->onDelete('cascade');   // Comportamiento al eliminar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagenes');
    }
};
