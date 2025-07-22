<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagenes';    // Indicar nombre de la tabla
    protected $primaryKey = 'id';     // Indicar nombre del PK
    protected $fillable = [
            'nombre', 
            'pelicula_id'];           // Indicar campos gestionados
    public $timestamps = true;        // Indicar que laravel va ha gestionar los campos
                                      // created_at y updated_at

    // Una imagen pertenece a una pelicula
    public function pelicula() {
        return $this->belongsTo(Pelicula::class);
    }
}
