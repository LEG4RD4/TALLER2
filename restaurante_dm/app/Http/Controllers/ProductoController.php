<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{

    public function index() {
        return view('inicio'); 
    }

    public function nosotros() {
        return view('nosotros');
    }

    
    public function menu() {
        $productos = Producto::all(); 
        return view('menu', compact('productos')); 
    }

    
    public function agregarAlPedido(Request $request) {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'descripcion' => 'required'
        ]);

        Producto::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('pedido.index')->with('status', '¡Hamburguesa añadida al monitor!');
    }

   
    public function pedidos() {
        // Filtramos para que NO salgan los PQRS en la lista de comida
        $productos = Producto::where('nombre', 'NOT LIKE', 'PQRS:%')->get(); 
        return view('pedido', compact('productos'));
    }

    public function buzon() {
        // Buscamos solo los registros que son PQRS
        $mensajes = Producto::where('nombre', 'LIKE', 'PQRS:%')
                    ->orderBy('created_at', 'desc')
                    ->get(); 
        
        return view('mensaje', compact('mensajes')); 
    }

    public function storeMensaje(Request $request) {
        // Validamos que lleguen todos los campos nuevos
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required',
            'tipo' => 'required',
            'comentario' => 'required'
        ]);

        
        $datos_completos = "Email: {$request->correo} | Tel: {$request->telefono} | Mensaje: {$request->comentario}";

        Producto::create([
           
            'nombre' => "PQRS: " . $request->nombre . " (" . $request->tipo . ")",
            'precio' => 0,
            'descripcion' => $datos_completos
        ]);

        return redirect()->route('buzon.index')->with('status', 'PQRS Enviado Exitosamente');
    }

   
    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable|string'
        ]);

        Producto::create($request->all());
        return redirect()->route('pedido.index')->with('status', '¡Registro manual exitoso!');
    }
}