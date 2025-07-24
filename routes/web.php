<?php

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\PruebaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Utilizar solo para implementar la plantilla Bootstrap
// Route::get('tmp', function(){
//     return view('admin.layouts.main');
// });

// Crear una ruta para http://127.0.0.1:8000/hola
Route::get('hola', function(){
    return 'Hola Mundo';
})->name('practica1');

// Rutas paso de parametros. http://127.0.0.1:8000/persona/Pedro/15
Route::get('persona/{nombre}/{edad}', function($nombre, $edad){
    return 'Hola ' . $nombre. ' usted tiene ' . $edad . ' años.';
})->name('practica2');

// Rutas paso de parametros con valores por defecto. 
// http://127.0.0.1:8000/estudiante
// http://127.0.0.1:8000/estudiante/Ruben
Route::get('estudiante/{nombre?}', function($nombre = 'Sin Nombre'){
    return 'Nombre Estudiante: ' . $nombre;
})->name('practica3');


// Rutas validacion de parametros. 
// http://127.0.0.1:8000/usuario/45  (ACEPTAR)
// http://127.0.0.1:8000/usuario/abc  (NO ACEPTAR)
Route::get('usuario/{id}', function($id){
    return 'ID DE USUARIO: ' . $id;
})->where('id', '[0-9]+')->name('practica4'); // Solo acepta numeros


// Rutas validacion de parametros. 
// http://127.0.0.1:8000/categoria/administrador  (ACEPTAR)
// http://127.0.0.1:8000/categoria/nuevo-admin    (ACEPTAR)
// http://127.0.0.1:8000/categoria/1000           (NO ACEPTAR)
Route::get('categoria/{slug}', function($slug){
    return 'CATEGORIA: ' . $slug;
})->where('slug', '[A-Za-z\-]+')->name('practica5'); // Solo acepta letras y guiones

// Rutas para APIs (JSON)
Route::get('/posts', function() {
    return response()->json([
        ['id' => 1, 'title' => 'Post 1'],
        ['id' => 2, 'title' => 'Post 2'],
    ]);
})->name('practica6');

// Rutas, grupos
Route::group(['prefix' => 'saludo'], function(){
    Route::get('dia', function(){
        return 'Buenos dias';
    })->name('saludo.dia');
    Route::get('tarde', function(){
        return 'Buenas tardes';
    })->name('saludo.tarde');
    Route::get('noche', function(){
        return 'Buenas noches';
    })->name('saludo.noche');
});

Route::get('prueba', [PruebaController::class, 'index']);

// http://127.0.0.1:8000/prueba/empleado/datos/Pedro/3000 
// http://127.0.0.1:8000/prueba/empleado/datos  
Route::get('/prueba/empleado/datos/{nombre?}/{sueldo?}', [PruebaController::class, 'mostrarDatos'])->name('prueba.empleado'); // Precionar CTRL + clic sobre el metodo

// http://127.0.0.1:8000/prueba/controlador
Route::get('/prueba/controlador', [PruebaController::class, 'holaBlade'])->name('prueba.controlador');

// http://127.0.0.1:8000/prueba/persona
Route::get('/prueba/persona', [PruebaController::class, 'datosPersona'])->name('prueba.persona');

// http://127.0.0.1:8000/prueba/componentes
Route::get('/prueba/componentes', [PruebaController::class, 'componentesBlade'])->name('prueba.componentes');


Route::group(['prefix'=>'admin'], function(){
    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
    Route::resource('user', UserController::class);
});

