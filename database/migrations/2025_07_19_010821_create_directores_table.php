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
        Schema::create('directores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        // Crear tabla pivot
        Schema::create('pelicula_director', function (Blueprint $table) {
            $table->id();
            // Crear columnas FK
            $table->unsignedBigInteger('pelicula_id');
            $table->unsignedBigInteger('director_id');
            // Crear relacion con peliculas
            $table->foreign('pelicula_id')
                ->references('id')
                ->on('peliculas')
                ->onDelete('cascade');
            // Crear relacion con directores
            $table->foreign('director_id')
                ->references('id')
                ->on('directores')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelicula_director');
        Schema::dropIfExists('directores');
    }
};
