<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

// 1. Inicio
Route::get('/', [ProductoController::class, 'index'])->name('inicio');

// 2. Nosotros
Route::get('/nosotros', [ProductoController::class, 'nosotros'])->name('nosotros');

// 3. Menú (Catálogo visual)
Route::get('/menu', [ProductoController::class, 'menu'])->name('menu');

// 4. Contacto (Apunta a mensaje.blade.php)
Route::get('/contacto', [ProductoController::class, 'contacto'])->name('mensaje');

// 5. Pedidos (Formulario y Tabla)
// IMPORTANTE: He cambiado el nombre a singular 'pedido.index' 
// para que coincida con el error que te salía en el menú.
Route::get('/pedidos', [ProductoController::class, 'pedidos'])->name('pedido.index');

// 6. Acción de Guardar
Route::post('/pedidos/guardar', [ProductoController::class, 'store'])->name('producto.store');
Route::post('/agregar-al-pedido', [ProductoController::class, 'agregarAlPedido'])->name('agregar.pedido');
// Enviar PQRS
Route::post('/enviar-pqrs', [ProductoController::class, 'storeMensaje'])->name('pqrs.store');


Route::get('/central-mensajes', [ProductoController::class, 'buzon'])->name('buzon.index');