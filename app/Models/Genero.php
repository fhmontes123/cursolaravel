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
}
