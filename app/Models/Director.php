<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $table = 'directores';  // Indicar nombre de la tabla
    protected $primaryKey = 'id';     // Indicar nombre del PK
    protected $fillable = ['nombre']; // Indicar campos gestionados
    public $timestamps = true;        // Indicar que laravel va ha gestionar los campos
                                      // created_at y updated_at
}
