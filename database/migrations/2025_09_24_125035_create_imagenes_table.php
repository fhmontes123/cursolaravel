<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('imagenes', function (Blueprint $table) {
            $table->id();
            // Agregar las columnas
            $table->string('nombre');
            // Relacion 1 a N con la tabla pelicula
            $table->unsignedBigInteger('pelicula_id');
            $table->foreign('pelicula_id')->references('id')
                ->on('peliculas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('imagenes');
    }
};
