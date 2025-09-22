<?php

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\CalculadoraController;
use App\Http\Controllers\SaludoController;
use Illuminate\Support\Facades\Route;

// Ruta raiz / Ruta Inicial
Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
    // http://localhost:8000/admin/home
    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
});

// Route::get('/plantilla', function () {
//     return view('admin.layouts.main');
// });

// Ruta de prueba -> http://localhost:8000
Route::get('/saludo', function () {
    return 'Hola desde web.php';
})->name('practica01');

// Paso de parametros -> http://localhost:8000/persona/Juan/15
Route::get('/persona/{nombre}/{edad}', function ($nombre, $edad) {
    return 'Mi nombres es ' . $nombre . ', tengo ' . $edad;
})->name('practica02');


// Paso de parametros - valores por defecto -> http://localhost:8000/estudiante/Ana
Route::get('/estudiante/{nombre?}', function ($nombre = 'Sin Nombre') {
    return 'Nombre del estudiante: ' . $nombre;
})->name('practica03');

// Validacion de parametros con expresiones regulares -> http://localhost:8000/usuario/45
Route::get('/usuario/{id}', function ($id) {
    return 'ID : ' . $id;
})->where('id', '[0-9]+')->name('practica04');

// Validacion de parametros con expresiones regulares -> http://localhost:8000/categoria/activo
Route::get('/categoria/{estado}', function ($estado) {
    return 'Estado : ' . $estado;
})->where('estado', '[A-Za-z\-]+')->name('practica05');

// Rutas para APIs (JSON) -> http://localhost:8000/posts
Route::get('/posts', function () {
    return response()->json([
        'posts' => [
            ['id' => 1, 'title' => 'Post 01'],
            ['id' => 2, 'title' => 'Post 02'],
            ['id' => 3, 'title' => 'Post 03'],
        ]
    ]);
})->name('practica06');

// Grupos -> http://localhost:8000/saludar/dia
//           http://localhost:8000/saludar/tarde
//           http://localhost:8000/saludar/noche
Route::group(['prefix' => '/saludar'], function () {
    Route::get('/dia', function () {
        return 'Buenos dias';
    })->name('saludo.dia');

    Route::get('/tarde', function () {
        return 'Buenas tardes';
    })->name('saludo.tarde');

    Route::get('/noche', function () {
        return 'Buenas noches';
    })->name('saludo.noche');
});

// Controlador
// http://localhost:8000/saludo/controlador
Route::get('/saludo/controlador', [SaludoController::class, 'funcionSaludar'])->name('practica07');
// http://localhost:8000/saludo/controlador/despedirse
Route::get('/saludo/controlador/despedirse', [SaludoController::class, 'funcionDespedirse'])->name('practica08');
// http://localhost:8000/saludo/controlador/datos/Maria
Route::get('/saludo/controlador/datos/{nombre}', [SaludoController::class, 'mostrarDatos'])->name('practica09');
// http://localhost:8000/calculadora/sumar/5/2
Route::get('/calculadora/sumar/{n1}/{n2}', [CalculadoraController::class, 'sumar'])->name('practica10');
// http://localhost:8000/saludo/plantilla
Route::get('/saludo/plantilla', [SaludoController::class, 'plantillaBlade'])->name('practica11');
// http://localhost:8000/saludo/persona/Maria
Route::get('/saludo/persona/{nombre}', [SaludoController::class, 'saludoPersona'])->name('practica12');
