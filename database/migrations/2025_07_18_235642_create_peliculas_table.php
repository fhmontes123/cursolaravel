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
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->float('costo');
            $table->text('resumen');
            $table->date('estreno');
            $table->timestamps();

            // Añadir la relacion de 1aN con la tabla generos
            $table->unsignedBigInteger('genero_id'); // no negativos
            $table->foreign('genero_id') // Identifica columna FK
                ->references('id')       // Columna PK en la tabla generos
                ->on ('generos')         // Tabla referenciada generos
                ->onDelete('cascade');   // Comportamiento al eliminar

            // Añadir la relacion de 1aN con la tabla users
            $table->unsignedBigInteger('user_id'); // no negativos
            $table->foreign('user_id')   // Identifica columna FK
                ->references('id')       // Columna PK en la tabla user
                ->on ('users')           // Tabla referenciada users
                ->onDelete('cascade');   // Comportamiento al eliminar
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peliculas');
    }
};
