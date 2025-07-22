<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    protected $table = 'peliculas';   // Indicar nombre de la tabla
    protected $primaryKey = 'id';     // Indicar nombre del PK
    protected $fillable = [
        'titulo', 
        'costo', 
        'resumen', 
        'estreno', 
        'genero_id', 
        'user_id'];                   // Indicar campos gestionados
    public $timestamps = true;        // Indicar que laravel va ha gestionar los campos
                                      // created_at y updated_at
}
