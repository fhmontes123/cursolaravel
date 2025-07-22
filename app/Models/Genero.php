<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table = 'generos';     // Indicar nombre de la tabla
    protected $primaryKey = 'id';     // Indicar nombre del PK
    protected $fillable = ['genero']; // Indicar campos gestionados
    public $timestamps = true;        // Indicar que laravel va ha gestionar los campos
                                      // created_at y updated_at

    /*
    * Relacion de un genero con muchas peliculas
    */
    public function peliculas(){
        // Relacion de 1 a N con pelicula
        return $this->hasMany(
            Pelicula::class,    // Nombre de la clase con la que se relaciona
            'genero_id',        // Nombre del campo FK dentro del modelo "Pelicula" 
            'id'                // Nombre del campo PK de la clase actual "Genero"
        );
    }
}
