@extends('admin.layouts.main')
@section('title', 'Pagina Inicial')
@section('content')
    <a href="{{ url('/saludo') }}">1. Hola mundo con Laravel (Usando URL)</a> <br />
    <a href="{{ route('practica01') }}">1. Hola mundo con Laravel (Usando Nombre de Ruta)</a> <br />
    <a href="{{ route('practica02', ['nombre' => 'Ana', 'edad' => 20]) }}">2. Paso de parametros</a> <br />
    <a href="{{ route('practica03', ['nombre' => 'Juan']) }}">3. Paso de parametros</a> <br />
    <a href="{{ route('saludo.dia') }}">Saludo Dia</a> <br />
    <a href="{{ route('saludo.tarde') }}">Saludo Tarde</a> <br />
    <a href="{{ route('saludo.noche') }}">Saludo Noche</a> <br />
@endsection
