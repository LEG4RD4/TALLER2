<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buzon; 

class BuzonController extends Controller
{
    public function index()
    {
        // Traemos los mensajes para mostrarlos en la Central de Inteligencia
        $mensajes = Buzon::orderBy('created_at', 'desc')->get();
        return view('mensaje', compact('mensajes'));
    }

    public function store(Request $request)
    {
        // 1. Validamos que lleguen los datos del formulario de "Nosotros"
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email',
            'comentario' => 'required',
        ]);

        // 2. Unificamos la info (Tipo y Teléfono) en el campo 'mensaje'
        // Usamos ?? 'N/A' por si el usuario deja esos campos vacíos
        $detalle = "TIPO: " . ($request->tipo ?? 'General') . 
                   " | TEL: " . ($request->telefono ?? 'Sin Tel') . 
                   " | DETALLE: " . $request->comentario;

        // 3. Guardamos en la tabla 'buzon' (definida en el modelo)
        Buzon::create([
            'nombre'  => $request->nombre,
            'correo'  => $request->correo,
            'mensaje' => $detalle
        ]);

        return back()->with('success', '¡Transmisión enviada al Monstruo!');
    }
}