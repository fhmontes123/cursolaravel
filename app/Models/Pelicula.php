<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model {
    protected $table = 'peliculas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'titulo',
        'costo',
        'resumen',
        'estreno',
        'genero_id',
        'user_id'
    ];
    public $timestamps = true;

    // Una pelicula pertenece a un usuario 
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    // Una pelicula pertenece a un genero 
    public function genero() {
        return $this->belongsTo(Genero::class, 'genero_id', 'id');
    }
    // Una pelicula puede tener muchas imagenes de portada 
    public function imagenes() {
        return $this->hasMany(Imagen::class, 'pelicula_id', 'id');
    }
    // Una pelicula puede tener muchos directores
    public function directores() {
        // belongsToMany('NombreModelo', 'tabla_relacion')
        return $this->belongsToMany(
            Director::class,     // Modelo relacionado
            'pelicula_director', // Tabla pivote
            'pelicula_id', // FK del modelo actual (Pelicula)
            'director_id' // FK del modelo relacionado (Director)
        )->withTimestamps();
    }
}
