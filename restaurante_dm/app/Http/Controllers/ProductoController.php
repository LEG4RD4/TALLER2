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

    // 2. NOSOTROS: Carga la historia
    public function nosotros() {
        return view('nosotros');
    }

    // 3. MENÚ: Carga el catálogo visual (Hardcoded + DB)
    public function menu() {
        // Aunque las burgers están fijas en el HTML, jalamos los datos por si acaso
        $productos = Producto::all(); 
        return view('menu', compact('productos')); 
    }

    // 4. ACCIÓN DE ORDENAR: Esta es la que agregamos
    // Recibe los datos de la burger seleccionada en la carta y los guarda
    public function agregarAlPedido(Request $request) {
        // Validamos que los datos lleguen del formulario oculto
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'descripcion' => 'required'
        ]);

        // Guardamos la elección del cliente en la base de datos
        Producto::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
        ]);

        // Redirigimos al Monitor de Pedidos para ver que se agregó
        return redirect()->route('pedido.index')->with('status', '¡Hamburguesa añadida al monitor!');
    }

    // 5. PEDIDOS: El monitor de solo lectura que creamos
    public function pedidos() {
        $productos = Producto::all(); 
        return view('pedido', compact('productos'));
    }

    // 6. CONTACTO: Carga mensaje.blade.php
    public function contacto() {
        return view('mensaje');
    }

    // 7. STORE (Opcional): Por si aún quieres usar el formulario manual
    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable|string'
        ]);

        Producto::create($request->all());

        return redirect()->route('pedido.index')->with('status', '¡Registro manual exitoso!');
    }
    // Para ver los mensajes recibidos
public function buzon() {
    // Si no tienes tabla de mensajes, puedes usar la de productos temporalmente 
    // o crear una migración nueva. Aquí asumimos que tienes una forma de listarlos:
    $mensajes = \App\Models\Producto::where('descripcion', 'LIKE', '%PQRS:%')->get(); 
    return view('mensaje', compact('mensajes'));
}

// Para guardar el PQRS
public function storeMensaje(Request $request) {
    \App\Models\Producto::create([
        'nombre' => "PQRS: " . $request->tipo,
        'precio' => 0,
        'descripcion' => "De: " . $request->nombre . " - Mensaje: " . $request->comentario
    ]);
    return redirect()->route('buzon.index')->with('status', 'PQRS Enviado');
}
}