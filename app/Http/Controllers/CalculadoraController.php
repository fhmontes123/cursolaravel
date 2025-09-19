<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculadoraController extends Controller {
    function sumar($n1, $n2) {
        return 'SUMA: ' . $n1 . ' + ' . $n2 . ' = ' . ($n1 + $n2);
    }
}
