<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('directores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        // Crear una tabla pivot
        // El siguiente codigo puede ir en cualquiera de los dos archivos 
        // de migración o crear su propio archivo de migración.
        Schema::create('pelicula_director', function (Blueprint $table) {
            $table->increments('id');
            // Crear los campos para los FK
            $table->unsignedBigInteger('pelicula_id');
            $table->unsignedBigInteger('director_id');
            // Relacionar las tablas
            $table->foreign('pelicula_id')->references('id')
                ->on('peliculas')->onDelete('cascade');
            $table->foreign('director_id')->references('id')
                ->on('directores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        // En caso de que se haga un rollback eliminar las tablas 
        Schema::drop('pelicula_director');
        Schema::dropIfExists('directores');
    }
};
