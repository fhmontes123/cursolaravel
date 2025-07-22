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

    // Una pelicula pertenece a un usuario
    public function user() {
        return $this->belongsTo(
            User::class,  // Nombre del modelo relacionado
            'user_id',    // Nombre del FK dentro de la clase "Pelicula"      
            'id'          // Nombre del PK del modelo relacionado (PK de User)
        );
    }

    // Una pelicula pertenece a un genero
    public function genero() {
        return $this->belongsTo(Genero::class, 'genero_id', 'id');
    }


    // Una pelicula puede tener muchas imagenes
    public function imagenes(){
        // Relacion de 1 a N con imagen
        return $this->hasMany(
            Imagen::class,    // Nombre de la clase con la que se relaciona
            'pelicula_id',    // Nombre del campo FK dentro del modelo "Pelicula" 
            'id'              // Nombre del campo PK de la clase actual "User"
        );
    }

    // Una pelicula puede tener muchos directores
    public function directores(){
        return $this->belongsToMany(
            Director::class,        // Modelo relacionado
            'pelicula_director',    // Tabla pivot
            'pelicula_id',          // FK del modelo actual (Pelicula)
            'director_id',          // FK del modelo relacionado (Director)
        )->withTimestamps();        // Gestion automatica de created_at y updated_at
    }
}
