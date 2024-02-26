<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PluralizadorController extends Controller
{
    public function pluralizador(Request $request)
    {
        $texto = $request->input('texto');

        $palabras = explode(' ', $texto);

        // Inicializamos el arreglo de cantidadesPorRegla con ceros.
        $cantidadesPorRegla = array_fill(0, 4, 0);

    
        function terminaEnVocal($palabra) {
            $ultimaLetra = substr($palabra, -1);
            return in_array($ultimaLetra, ['a', 'e', 'i', 'o', 'u']);
        }

    
        function pluralizar($palabra, &$cantidadesPorRegla) {
            if (terminaEnVocal($palabra)) {
                $cantidadesPorRegla[0]++;
                return $palabra . 's';
            } elseif (in_array(substr($palabra, -1), ['s', 'x'])) {
                $cantidadesPorRegla[1]++;
                return $palabra;
            } elseif (substr($palabra, -1) === 'z') {
                $cantidadesPorRegla[2]++;
                return substr($palabra, 0, -1) . 'ces';
            } else {
                $cantidadesPorRegla[3]++;
                return $palabra . 'es';
            }
        }


        $palabrasPluralizadas = array_map(function ($palabra) use (&$cantidadesPorRegla) {
            return pluralizar(strtolower($palabra), $cantidadesPorRegla);
        }, $palabras);

     
        return [
            'palabras' => $palabrasPluralizadas,
            'cantidadesPorRegla' => $cantidadesPorRegla
        ];
    }
}