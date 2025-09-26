<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Director extends Model {
    protected $table = 'directores';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre'];
    public $timestamps = true;

    // Un director tiene muchas peliculas
    public function peliculas() {
        return $this->belongsToMany(
            Pelicula::class,       // Modelo relacionado
            'pelicula_director',   // Tabla pivote
            'director_id',         // FK del modelo actual (Director)
            'pelicula_id'          // FK del modelo relacionado (Pelicula)
        )->withTimestamps();
    }

    public function scopeSearch($query, $nombre) {
        return $query->where('nombre', 'LIKE', '%' . $nombre . '%');
    }
}
