<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function index() {
        return 'Hola desde PruebaController';
    }

    // Paso de parametros
    public function mostrarDatos($nombre='Ana', $sueldo=1200) {
        return 'Nombre: '. $nombre.'<br> Sueldo: '.$sueldo;
    }

    // Ejemplo con blade
    public function holaBlade(){
        return view('prueba.hola'); // resources/views/prueba/hola.blade.php
    }

    // Enviar datos a la vista
    public function datosPersona(){
        $nombre = 'Juan';
        $edad = 12;

        // dd($nombre);

        // ENVIO DATOS A LA VISTA MEDIANTE WITH
        // return view('prueba.datos')  // resources/views/prueba/datos.blade.php
        //     ->with('nombre', $nombre)
        //     ->with('edad', $edad);

        // ENVIO DATOS A LA VISTA MEDIANTE ARRAY ASOCIATIVO
        // $data['nombre'] = $nombre;
        // $data['edad'] = $edad;
        // return view('prueba.datos', $data);

        // ENVIO DATOS A LA VISTA MEDIANTE COMPACT
        return view('prueba.datos', compact('nombre', 'edad'));
    }

    public function componentesBlade(){
        return view('prueba.componentes');
    }
}
