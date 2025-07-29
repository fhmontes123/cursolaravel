@extends('admin.layouts.main')

@section('title', 'MENU PRINCIPAL')

@section('content')
    <h3>Bienvenido {{ Auth::user()->name }}</h3>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); this.closest('form').submit();">
            Cerrar Sesión
        </a>
    </form>
    <br>

    <a href="{{ url('hola') }}">1. Hola Mundo (URL)</a>
    <br>
    <a href="{{ route('practica1') }}">2. Hola Mundo (NAME)</a>
    <br>
    <a href="{{ route('practica2', ['nombre' => 'Jesus', 'edad' => 33]) }}">3. Paso de parametros</a>
    <br>
    <a href="{{ route('practica3') }}">4. Paso de parametros por defecto</a>
    <br>
    <a href="{{ route('saludo.dia') }}">5. Buenos dias</a>
    <br>
    <a href="{{ route('saludo.tarde') }}">6. Buenas tardes</a>
    <br>
    <a href="{{ route('saludo.noche') }}">7. Buenas noches</a>
@endsection
