<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaludoController extends Controller
{

    private $data = [
        [
            "id" => 1,
            "nombre" => "Juan",
            "apellido" => "Pérez",
            "edad" => 28
        ],
        [
            "id" => 2,
            "nombre" => "María",
            "apellido" => "González",
            "edad" => 24
        ],
        [
            "id" => 3,
            "nombre" => "Carlos",
            "apellido" => "Rodríguez",
            "edad" => 32
        ],
        [
            "id" => 4,
            "nombre" => "Ana",
            "apellido" => "López",
            "edad" => 22
        ],
        [
            "id" => 5,
            "nombre" => "Pedro",
            "apellido" => "Martínez",
            "edad" => 30
        ]
    ];

    public function ListaEspecifica(Request $request)
    {
        return response()->json($this->data);
    }

    public function getById(Request $request, $id)
    {
        $item = null;
        foreach ($this->data as $element) {
            if ($element["id"] == $id) {
                $item = $element;
                break;
            }
        }

        if ($item) {
            return response()->json($item);
        } else {
            return response()->json(["error" => "No se encontró el elemento con el ID especificado"], 404);
        }
    }







    

    
    public function saludar(Request $request)
    {
        // Valida que la solicitud contenga un campo "nombre" en formato JSON.
        $request->validate([
            'nombre' => 'required|string',
        ]);

        // Obtiene el nombre del cuerpo de la solicitud JSON.
        $nombre = $request->input('nombre');

        // Crea una respuesta en formato JSON.
        $respuesta = [
            'mensaje' => "¡Hola, $nombre!",
            'nombre' => $nombre,
        ];

        // Devuelve la respuesta en formato JSON.
        return response()->json($respuesta);
    }

}
