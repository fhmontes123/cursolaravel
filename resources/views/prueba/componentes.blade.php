<h1>COMPONENTES Y DIRECTIVAS BLADE</h1>

<h2>IMPRIMIR VALORES</h2>
<?php
    $nombre = 'Jorge';
    $edad = 22;
?>
<p>Nombre: {{ $nombre }}</p>
<p>Edad: {{ $edad }}</p>

{{-- Esto es un comentario en blade --}}

<h2>CONDICIONAL IF</h2>
@if ($edad >= 18)
    <p>Usted es mayor de edad</p>
@else
    <p>Usted es menor de edad</p>
@endif

<h2>CONDICIONAL SWITCH</h2>
@php
    $status = 2;
@endphp
@switch($status)
    @case(1)
        <p>Caso 1</p>
        @break
    @case(2)
        <p>Caso 2</p>
        @break
    @default
        <p>Caso por defecto</p>
@endswitch

<h2>BUCLE FOR</h2>
@for ($i = 0; $i < 10; $i++)
    {{ $i }},
@endfor

<h2>BUCLE WHILE</h2>
@php $cont = 1 @endphp
@while ($cont <= 20)
    {{ $cont++ }},
@endwhile

<h2>BUCLE FOREACH</h2>
@php $nombres = ['Mateo', 'Juan', 'Pedro']; @endphp
@foreach ($nombres as $nom)
    {{ $nom }},
@endforeach