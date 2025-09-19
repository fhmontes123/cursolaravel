<?php

use App\Http\Controllers\CalculadoraController;
use App\Http\Controllers\SaludoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Ruta de prueba -> http://localhost:8000
Route::get('/saludo', function () {
    return 'Hola desde web.php';
});

// Paso de parametros -> http://localhost:8000/persona/Juan/15
Route::get('/persona/{nombre}/{edad}', function ($nombre, $edad) {
    return 'Mi nombres es ' . $nombre . ', tengo ' . $edad;
});


// Paso de parametros - valores por defecto -> http://localhost:8000/estudiante/Ana
Route::get('/estudiante/{nombre?}', function ($nombre = 'Sin Nombre') {
    return 'Nombre del estudiante: ' . $nombre;
});

// Validacion de parametros con expresiones regulares -> http://localhost:8000/usuario/45
Route::get('/usuario/{id}', function ($id) {
    return 'ID : ' . $id;
})->where('id', '[0-9]+');

// Validacion de parametros con expresiones regulares -> http://localhost:8000/categoria/activo
Route::get('/categoria/{estado}', function ($estado) {
    return 'Estado : ' . $estado;
})->where('estado', '[A-Za-z\-]+');

// Rutas para APIs (JSON) -> http://localhost:8000/posts
Route::get('/posts', function () {
    return response()->json([
        'posts' => [
            ['id' => 1, 'title' => 'Post 01'],
            ['id' => 2, 'title' => 'Post 02'],
            ['id' => 3, 'title' => 'Post 03'],
        ]
    ]);
});

// Grupos -> http://localhost:8000/saludar/dia
//           http://localhost:8000/saludar/tarde
//           http://localhost:8000/saludar/noche
Route::group(['prefix' => '/saludar'], function () {
    Route::get('/dia', function () {
        return 'Buenos dias';
    });

    Route::get('/tarde', function () {
        return 'Buenas tardes';
    });

    Route::get('/noche', function () {
        return 'Buenas noches';
    });
});

// Controlador
// http://localhost:8000/saludo/controlador
Route::get('/saludo/controlador', [SaludoController::class, 'funcionSaludar']);
// http://localhost:8000/saludo/controlador/despedirse
Route::get('/saludo/controlador/despedirse', [SaludoController::class, 'funcionDespedirse']);
// http://localhost:8000/saludo/controlador/datos/Maria
Route::get('/saludo/controlador/datos/{nombre}', [SaludoController::class, 'mostrarDatos']);
// http://localhost:8000/calculadora/sumar/5/2
Route::get('/calculadora/sumar/{n1}/{n2}', [CalculadoraController::class, 'sumar']);
// http://localhost:8000/saludo/plantilla
Route::get('/saludo/plantilla', [SaludoController::class, 'plantillaBlade']);
// http://localhost:8000/saludo/persona/Maria
Route::get('/saludo/persona/{nombre}', [SaludoController::class, 'saludoPersona']);
