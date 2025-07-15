<?php

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
});

// Rutas paso de parametros. http://127.0.0.1:8000/persona/Pedro/15
Route::get('persona/{nombre}/{edad}', function($nombre, $edad){
    return 'Hola ' . $nombre. ' usted tiene ' . $edad . ' años.';
});

// Rutas paso de parametros con valores por defecto. 
// http://127.0.0.1:8000/estudiante
// http://127.0.0.1:8000/estudiante/Ruben
Route::get('estudiante/{nombre?}', function($nombre = 'Sin Nombre'){
    return 'Nombre Estudiante: ' . $nombre;
});


// Rutas validacion de parametros. 
// http://127.0.0.1:8000/usuario/45  (ACEPTAR)
// http://127.0.0.1:8000/usuario/abc  (NO ACEPTAR)
Route::get('usuario/{id}', function($id){
    return 'ID DE USUARIO: ' . $id;
})->where('id', '[0-9]+'); // Solo acepta numeros


// Rutas validacion de parametros. 
// http://127.0.0.1:8000/categoria/administrador  (ACEPTAR)
// http://127.0.0.1:8000/categoria/nuevo-admin    (ACEPTAR)
// http://127.0.0.1:8000/categoria/1000           (NO ACEPTAR)
Route::get('categoria/{slug}', function($slug){
    return 'CATEGORIA: ' . $slug;
})->where('slug', '[A-Za-z\-]+'); // Solo acepta letras y guiones

// Rutas para APIs (JSON)
Route::get('/posts', function() {
    return response()->json([
        ['id' => 1, 'title' => 'Post 1'],
        ['id' => 2, 'title' => 'Post 2'],
    ]);
});

// Rutas, grupos
Route::group(['prefix' => 'saludo'], function(){
    Route::get('dia', function(){
        return 'Buenos dias';
    });
    Route::get('tarde', function(){
        return 'Buenas tardes';
    });
    Route::get('noche', function(){
        return 'Buenas noches';
    });
});

Route::get('prueba', [PruebaController::class, 'index']);

// http://127.0.0.1:8000/prueba/empleado/datos/Pedro/3000 
// http://127.0.0.1:8000/prueba/empleado/datos  
Route::get('/prueba/empleado/datos/{nombre?}/{sueldo?}', [PruebaController::class, 'mostrarDatos']); // Precionar CTRL + clic sobre el metodo

// http://127.0.0.1:8000/prueba/controlador
Route::get('/prueba/controlador', [PruebaController::class, 'holaBlade']);

// http://127.0.0.1:8000/prueba/persona
Route::get('/prueba/persona', [PruebaController::class, 'datosPersona']);

// http://127.0.0.1:8000/prueba/componentes
Route::get('/prueba/componentes', [PruebaController::class, 'componentesBlade']);

