<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buzon; 

class BuzonController extends Controller
{
    public function index()
    {
       
        $mensajes = Buzon::orderBy('created_at', 'desc')->get();
        return view('mensaje', compact('mensajes'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email',
            'comentario' => 'required',
        ]);

        $detalle = "TIPO: " . ($request->tipo ?? 'General') . 
                   " | TEL: " . ($request->telefono ?? 'Sin Tel') . 
                   " | DETALLE: " . $request->comentario;

      
        Buzon::create([
            'nombre'  => $request->nombre,
            'correo'  => $request->correo,
            'mensaje' => $detalle
        ]);

        return back()->with('success', '¡Transmisión enviada al Monstruo!');
    }
}