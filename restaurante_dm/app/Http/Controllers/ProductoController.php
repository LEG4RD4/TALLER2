<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; // Conexión con tu tabla en pgAdmin

class ProductoController extends Controller
{
    // 1. INICIO: Carga la portada principal
    public function index() {
        return view('inicio'); 
    }

    // 2. NOSOTROS: Carga la historia y el formulario de PQRS
    public function nosotros() {
        return view('nosotros');
    }

    // 3. MENÚ: Carga el catálogo visual
    public function menu() {
        $productos = Producto::all(); 
        return view('menu', compact('productos')); 
    }

    // 4. ACCIÓN DE ORDENAR: Guarda la burger seleccionada
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

    // 5. PEDIDOS: El monitor de solo lectura
    public function pedidos() {
        // Filtramos para que NO salgan los PQRS en la lista de comida
        $productos = Producto::where('nombre', 'NOT LIKE', 'PQRS:%')->get(); 
        return view('pedido', compact('productos'));
    }

    // 6. BUZÓN (Vista): Muestra la tabla elegante de mensajes
    public function buzon() {
        // Buscamos solo los registros que son PQRS
        $mensajes = Producto::where('nombre', 'LIKE', 'PQRS:%')
                    ->orderBy('created_at', 'desc')
                    ->get(); 
        
        return view('mensaje', compact('mensajes')); 
    }

    // 7. STORE PQRS: Guarda los datos del formulario "Nosotros"
    public function storeMensaje(Request $request) {
        // Validamos que lleguen todos los campos nuevos
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required',
            'tipo' => 'required',
            'comentario' => 'required'
        ]);

        // EMPAQUETADO EXÓTICO: Unimos los datos con "|" para la tabla elegante
        $datos_completos = "Email: {$request->correo} | Tel: {$request->telefono} | Mensaje: {$request->comentario}";

        Producto::create([
            // Guardamos el nombre del cliente y el tipo de PQRS en el campo nombre
            'nombre' => "PQRS: " . $request->nombre . " (" . $request->tipo . ")",
            'precio' => 0,
            'descripcion' => $datos_completos
        ]);

        return redirect()->route('buzon.index')->with('status', 'PQRS Enviado Exitosamente');
    }

    // 8. STORE MANUAL (Opcional)
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