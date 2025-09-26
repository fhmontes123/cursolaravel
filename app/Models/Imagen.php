<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model {
    protected $table = 'imagenes';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'pelicula_id'];
    public $timestamps = true;

    // Una imagen pertenece a una sola pelicula
    public function pelicula() {
        return $this->belongsTo(Pelicula::class, 'pelicula_id', 'id');
    }
}
