<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaludoController extends Controller {
    public function funcionSaludar() {
        return 'Hola desde SaludoController';
    }

    public function funcionDespedirse() {
        return 'Chau desde SaludoController, ten un buen dia.';
    }

    public function mostrarDatos($nombre) {
        return 'Hola ' . $nombre . ' desde el controlador';
    }

    public function plantillaBlade() {
        return view('saludo.plantilla');
    }

    // ENVIAR DATOS DESDE EL CONTROLADOR HACIA LA PLANTILLA USANDO WITH
    // public function saludoPersona($nombre) {
    //     return view('saludo.persona')
    //         ->with('nombre', $nombre);
    // }

    // ENVIAR DATOS DESDE EL CONTROLADOR HACIA LA PLANTILLA USANDO ARRAYS
    // public function saludoPersona($nombre) {
    //     $data['nombre'] = $nombre;
    //     return view('saludo.persona', $data);
    // }

    // ENVIAR DATOS DESDE EL CONTROLADOR HACIA LA PLANTILLA USANDO COMPACT
    public function saludoPersona($nombre) {
        return view('saludo.persona', compact('nombre'));
    }
}
