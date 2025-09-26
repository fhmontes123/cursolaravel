<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model {
    // Nombre de la tabla
    protected $table = 'generos';
    // Nombre del PK
    protected $primaryKey = 'id';
    // Listado de datos administados por el usuario
    protected $fillable = ['genero'];
    // Indicar fechas administradas por el sistema
    public $timestamps = true;

    // Un genero tiene muchas peliculas
    public function peliculas() {
        // Retornar el tipo de relación indicando el Modelo 
        return $this->hasMany(Pelicula::class, 'genero_id', 'id');
    }
}
