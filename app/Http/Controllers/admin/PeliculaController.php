<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Director;
use App\Models\Genero;
use App\Models\Imagen;
use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pelicula.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $generos = Genero::orderBy('genero', 'ASC')->get();
        $directores = Director::orderBy('nombre', 'ASC')->get();
        return view('admin.pelicula.create', compact('generos', 'directores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pelicula = new Pelicula($request->all());
        $pelicula->user_id = Auth::user()->id;
        $pelicula->save();

        $pelicula->directores()->attach($request->directores);

        if($request->file('imagen')){
            $file = $request->file('imagen');
            $name_file = 'cinema_' . time() . '.' . $file->getClientOriginalExtension();
            $path_file = public_path().'/imagenes/pelicula';
            $file->move($path_file, $name_file);
        }

        $imagen=new Imagen();
        $imagen->nombre = $name_file;
        $imagen->pelicula()->associate($pelicula);
        $imagen->save();

        return redirect()
            ->route('pelicula.index')
            ->with('success', 'Se ha guardado ' . $pelicula->titulo . ' correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function eloquentORM() {
        $peliculas = Pelicula::with(['user', 'genero', 'directores'])
            ->where('estreno', '>', now()->subYear())
            ->orderBy('titulo')
            ->get();
        dd($peliculas);
    }

    public function queryBuilder() {
        $peliculas = DB::table('peliculas')
            ->select('peliculas.*', 'users.name as autor')
            ->join('users', 'peliculas.user_id', '=', 'users.id')
            ->where('peliculas.costo', '>',10)
            ->get();
        dd($peliculas);
    }

    public function sqlNativo() {
        $peliculas = DB::select("
            SELECT p.*, u.name
            FROM peliculas p
            JOIN users u ON p.user_id = u.id
            WHERE p.estreno > ?
        ", [now()->subYear()]);
        dd($peliculas);
    }
}
